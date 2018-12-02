   elif isinstance(value, list):
          for v in value:
            command_line.append(arg_name)
            command_line.append(str(v))
        else:
          command_line.append(arg_name)
          command_line.append(str(value))
    # Note: actool crashes if inputs path are relative, so use os.path.abspath
    # to get absolute path name for inputs.
    command_line.extend(map(os.path.abspath, inputs))
    subprocess.check_call(command_line)

  def ExecMergeInfoPlist(self, output, *inputs):
    """Merge multiple .plist files into a single .plist file."""
    merged_plist = {}
    for path in inputs:
      plist = self._LoadPlistMaybeBinary(path)
      self._MergePlist(merged_plist, plist)
    plistlib.writePlist(merged_plist, output)

  def ExecCodeSignBundle(self, key, resource_rules, entitlements, provisioning):
    """Code sign a bundle.

    This function tries to code sign an iOS bundle, following the same
    algorithm as Xcode:
      1. copy ResourceRules.plist from the user or the SDK into the bundle,
      2. pick the provisioning profile that best match the bundle identifier,
         and copy it into the bundle as embedded.mobileprovision,
      3. copy Entitlements.plist from user or SDK next to the bundle,
      4. code sign the bundle.
    """
    resource_rules_path = self._InstallResourceRules(resource_rules)
    substitutions, overrides = self._InstallProvisioningProfile(
        provisioning, self._GetCFBundleIdentifier())
    entitlements_path = self._InstallEntitlements(
        entitlements, substitutions, overrides)
    subprocess.check_call([
        'codesign', '--force', '--sign', key, '--resource-rules',
        resource_rules_path, '--entitlements', entitlements_path,
        os.path.join(
            os.environ['TARGET_BUILD_DIR'],
            os.environ['FULL_PRODUCT_NAME'])])

  def _InstallResourceRules(self, resource_rules):
    """Installs ResourceRules.plist from user or SDK into the bundle.

    Args:
      resource_rules: string, optional, path to the ResourceRules.plist file
        to use, default to "${SDKROOT}/ResourceRules.plist"

    Returns:
      Path to the copy of ResourceRules.plist into the bundle.
    """
    source_path = resource_rules
    target_path = os.path.join(
        os.environ['BUILT_PRODUCTS_DIR'],
        os.environ['CONTENTS_FOLDER_PATH'],
        'ResourceRules.plist')
    if not so