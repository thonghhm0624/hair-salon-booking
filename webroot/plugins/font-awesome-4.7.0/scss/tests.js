INDX( 	 U�q�           (   �  �                            �p    p Z     l�    k���̕���̕���̕��ڎ���       �               C H A N G E L O G . m d     ��    h R     l�    b��̕���3�̕���3�̕�)�JU��       	               i n d e x . j s    
 /�    ` P     l�    �C�̕�F���̕�F���̕������       /               L I C E N S E fT    p Z     l�    ��l͕��m͕��m͕�N��_^��                        n o d e _ m o d u l e s       �t    p Z     l�    c���̕�W�s�̕����̕��EU��                      p a c k a g e . j s o n       ��   
 h T     l�    6���̕�6*��̕�6*��̕�ǿi���        �              	 R E A D M E . m d                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          INDX( 	 �p�           (   H  �       �                    dt    h T     ��   
 �0O�̕�x��̕�x��̕�x��̕�X       X               	 . j s h i n t r c e o ��   	 h V     ��   
 C�C�̕����̕����̕����̕�(       %               
 . n p m i g n o r e o �t    h V     ��   
 ����̕�L=��̕�L=��̕�L=��̕�       �              
 a d d o n . g y p i   I�    X H     ��   
 Rp��̕�ӧ��̕�ӧ��̕�t�l^��                        b i n �u    p Z     ��   
 ��C�̕�ť��̕�ť��̕ ť��̕� P      �@               C H A N G E L O G . m d Z     T�    X H     ��   
 ����̕�w9>͕�w9>͕����6��                        g y p l(    X H     ��   
 :�J͕��ɵ͕��ɵ͕�7(��                        l i b ��    ` P     ��   
 ���̕��1�̕��1�̕��1�̕�       N               L I C E N S E VT    p Z     ��   
 �=͕���N͕���N͕��e!D��                        n o d e _ m o d u l e s      *    p Z     ��   
 �Sc	͕�n�f	͕�qh	͕�n�f	͕�      B               p a c k a g e . j s o n     &�    h T     ��   
 ��B�̕�7���̕�7���̕�7���̕� 0      �)              	 R E A D M E . m d     )    X H     ��   
 a5�͕��F�͕��F�͕�V�AP��                        s r c ,)    ` J     ��   
 N�͕��wP	͕��wP	͕�_  ��                        t e s t                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             /**
 * @author Toru Nagashima
 * @copyright 2016 Toru Nagashima. All rights reserved.
 * See LICENSE file in root directory for full license.
 */
"use strict"

//------------------------------------------------------------------------------
// Helpers
//------------------------------------------------------------------------------

/*istanbul ignore next */
/**
 * This function is copied from https://github.com/eslint/eslint/blob/2355f8d0de1d6732605420d15ddd4f1eee3c37b6/lib/ast-utils.js#L648-L684
 *
 * @param {ASTNode} node - The node to get.
 * @returns {string|null} The property name if static. Otherwise, null.
 * @private
 */
function getStaticPropertyName(node) {
    let prop = null

    switch (node && node.type) {
        case "Property":
        case "MethodDefinition":
            prop = node.key
            break

        case "MemberExpression":
            prop = node.property
            break

        // no default
    }

    switch (prop && prop.type) {
        case "Literal":
            return String(prop.value)

        case "TemplateLiteral":
            if (prop.expressions.length === 0 && prop.quasis.length === 1) {
                return prop.quasis[0].value.cooked
            }
            break

        case "Identifier":
            if (!node.computed) {
                return prop.name
            }
            break

        // no default
    }

    return null
}

/**
 * Checks whether the given node is assignee or not.
 *
 * @param {ASTNode} node - The node to check.
 * @returns {boolean} `true` if the node is assignee.
 */
function isAssignee(node) {
    return (
        node.parent.type === "AssignmentExpression" &&
        node.parent.left === node
    )
}

/**
 * Gets the top assignment expression node if the given node is an assignee.
 *
 * This is used to distinguish 2 assignees belong to the same assignment.
 * If the node is not an assignee, this returns null.
 *
 * @param {ASTNode} leafNode - The node to get.
 * @returns {ASTNode|null} The top assignment expression node, or null.
 */
function getTopAssignment(leafNode) {
    let node = leafNode

    // Skip MemberExpressions.
    while (node.parent.type === "MemberExpression" && node.parent.object === node) {
        node = node.parent
    }

    // Check assignments.
    if (!isAssignee(node)) {
        return null
    }

    // Find the top.
    while (node.parent.type === "AssignmentExpression") {
        node = node.parent
    }

    return node
}

/**
 * Gets top assignment nodes of the given node list.
 *
 * @param {ASTNode[]} nodes - The node list to get.
 * @returns {ASTNode[]} Gotten top assignment nodes.
 */
function createAssignmentList(nodes) {
    return nodes.map(getTopAssignment).filter(Boolean)
}

/**
 * Gets the reference of `module.exports` from the given scope.
 *
 * @param {escope.Scope} scope - The scope to get.
 * @returns {ASTNode[]} Gotten MemberExpression node list.
 */
function getModuleExportsNodes(scope) {
    const variable = scope.set.get("module")
    if (variable == null) {
        return []
    }
    return variable.references
        .map(reference => reference.identifier.parent)
        .filter(node => (
            node.type === "MemberExpression" &&
            getStaticPropertyName(node) === "exports"
        ))
}

/**
 * Gets the reference of `exports` from the given scope.
 *
 * @param {escope.Scope} scope - The scope to get.
 * @returns {ASTNode[]} Gotten Identifier node list.
 */
function getExportsNodes(scope) {
    const variable = scope.set.get("exports")
    if (variable == null) {
        return []
    }
    return variable.references.map(reference => reference.identifier)
}

/**
 * The definition of this rule.
 *
 * @param {RuleContext} context - The rule context to check.
 * @returns {object} The definition of this rule.
 */
function create(context) {
    const mode = context.options[0] || "module.exports"
    const batchAssignAllowed = Boolean(
        context.options[1] != null &&
        context.options[1].allowBatchAssign
    )
    const sourceCode = context.getSourceCode()

    /**
     * Gets the location info of reports.
     *
     * exports = foo
     * ^^^^^^^^^
     *
     * module.exports = foo
     * ^^^^^^^^^^^^^^^^
     *
     * @param {ASTNode} node - The node of `exports`/`module.exports`.
     * @returns {Location} The location info of reports.
     */
    function getLocation(node) {
        const token = sourceCode.getTokenAfter(node)
        return {
            start: node.loc.start,
            end: token.loc.end,
        }
    }

    /**
     * Enforces `module.exports`.
     * This warns references of `exports`.
     *
     * @returns {void}
     */
    function enforceModuleExports() {
        const globalScope = context.getScope()
        const exportsNodes = getExportsNodes(globalScope)
        const assignList = batchAssignAllowed
            ? createAssignmentList(getModuleExportsNodes(globalScope))
            : []

        for (const node of exportsNodes) {
            // Skip if it's a batch assignment.
            if (assignList.length > 0 &&
                assignList.indexOf(getTopAssignment(node)) !== -1
            ) {
                continue
            }

            // Report.
            context.report({
                node,
                loc: getLocation(node),
                message:
                    "Unexpected access to 'exports'. " +
                    "Use 'module.exports' instead.",
            })
        }
    }

    /**
     * Enforces `exports`.
     * This warns references of `module.exports`.
     *
     * @returns {void}
     */
    function enforceExports() {
        const globalScope = context.getScope()
        const exportsNodes = getExportsNodes(globalScope)
        const moduleExportsNodes = getModuleExportsNodes(globalScope)
        const assignList = batchAssignAllowed
            ? createAssignmentList(exportsNodes)
            : []
        const batchAssignList = []

        for (const node of moduleExportsNodes) {
            // Skip if it's a batch assignment.
            if (assignList.length > 0) {
                const found = assignList.indexOf(getTopAssignment(node))
                if (found !== -1) {
                    batchAssignList.push(assignList[found])
                    assignList.splice(found, 1)
                    continue
                }
            }

            // Report.
            context.report({
                node,
                loc: getLocation(node),
                message:
                    "Unexpected access to 'module.exports'. " +
                    "Use 'exports' instead.",
            })
        }

        // Disallow direct assignment to `exports`.
        for (const node of exportsNodes) {
            // Skip if it's not assignee.
            if (!isAssignee(node)) {
                continue
            }

            // Check if it's a batch assignment.
            if (batchAssignList.indexOf(getTopAssignment(node)) !== -1) {
                continue
            }

            // Report.
            context.report({
                node,
                loc: getLocation(node),
                message:
                    "Unexpected assignment to 'exports'. " +
                    "Don't modify 'exports' itself.",
            })
        }
    }

    return {
        "Program:exit"() {
            switch (mode) {
                case "module.exports":
                    enforceModuleExports()
                    break
                case "exports":
                    enforceExports()
                    break

                // no default
            }
        },
    }
}

//------------------------------------------------------------------------------
// Rule Definition
//------------------------------------------------------------------------------

module.exports = {
    create,
    meta: {
        docs: {
            description: "enforce either `module.exports` or `exports`",
            category: "Stylistic Issues",
            recommended: false,
        },
        fixable: false,
        schema: [
            { //
                enum: ["module.exports", "exports"],
            },
            {
                type: "object",
                properties: {allowBatchAssign: {type: "boolean"}},
                additionalProperties: false,
            },
        ],
    },
}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @since         3.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\View\Exception;

use Cake\Core\Exception\Exception;

/**
 * Used when a helper cannot be found.
 */
class MissingHelperException extends Exception
{

    protected $_messageTemplate = 'Helper class %s could not be found.';
}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <!doctype html>
<html lang="en">
<head>
    <title>Code coverage report for __root__/</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../prettify.css">
    <link rel="stylesheet" href="../base.css">
    <style type='text/css'>
        div.coverage-summary .sorter {
            background-image: url(../sort-arrow-sprite.png);
        }
    </style>
</head>
<body>
<div class="header high">
    <h1>Code coverage report for <span class="entity">__root__/</span></h1>
    <h2>
        Statements: <span class="metric">100% <small>(4 / 4)</small></span> &nbsp;&nbsp;&nbsp;&nbsp;
        Branches: <span class="metric">100% <small>(2 / 2)</small></span> &nbsp;&nbsp;&nbsp;&nbsp;
        Functions: <span class="metric">100% <small>(1 / 1)</small></span> &nbsp;&nbsp;&nbsp;&nbsp;
        Lines: <span class="metric">100% <small>(4 / 4)</small></span> &nbsp;&nbsp;&nbsp;&nbsp;
        Ignored: <span class="metric"><span class="ignore-none">none</span></span> &nbsp;&nbsp;&nbsp;&nbsp;
    </h2>
    <div class="path"><a href="../index.html">All files</a> &#187; __root__/</div>
</div>
<div class="body">
<div class="coverage-summary">
<table>
<thead>
<tr>
   <th data-col="file" data-fmt="html" data-html="true" class="file">File</th>
   <th data-col="pic" data-type="number" data-fmt="html" data-html="true" class="pic"></th>
   <th data-col="statements" data-type="number" data-fmt="pct" class="pct">Statements</th>
   <th data-col="statements_raw" data-type="number" data-fmt="html" class="abs"></th>
   <th data-col="branches" data-type="number" data-fmt="pct" class="pct">Branches</th>
   <th data-col="branches_raw" data-type="number" data-fmt="html" class="abs"></th>
   <th data-col="functions" data-type="number" data-fmt="pct" class="pct">Functions</th>
   <th data-col="functions_raw" data-type="number" data-fmt="html" class="abs"></th>
   <th data-col="lines" data-type="number" data-fmt="pct" class="pct">Lines</th>
   <th data-col="lines_raw" data-type="number" data-fmt="html" class="abs"></th>
</tr>
</thead>
<tbody><tr>
	<td class="file high" data-value="index.js"><a href="index.js.html">index.js</a></td>
	<td data-value="100" class="pic high"><span class="cover-fill cover-full" style="width: 100px;"></span><span class="cover-empty" style="width:0px;"></span></td>
	<td data-value="100" class="pct high">100%</td>
	<td data-value="4" class="abs high">(4&nbsp;/&nbsp;4)</td>
	<td data-value="100" class="pct high">100%</td>
	<td data-value="2" class="abs high">(2&nbsp;/&nbsp;2)</td>
	<td data-value="100" class="pct high">100%</td>
	<td data-value="1" class="abs high">(1&nbsp;/&nbsp;1)</td>
	<td data-value="100" class="pct high">100%</td>
	<td data-value="4" class="abs high">(4&nbsp;/&nbsp;4)</td>
	</tr>

</tbody>
</table>
</div>
</div>
<div class="footer">
    <div class="meta">Generated by <a href="http://istanbul-js.org/" target="_blank">istanbul</a> at Thu Dec 03 2015 15:00:03 GMT-0800 (PST)</div>
</div>
<script src="../prettify.js"></script>
<script>
window.onload = function () {
        if (typeof prettyPrint === 'function') {
            prettyPrint();
        }
};
</script>
<script src="../sorter.js"></script>
</body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 # Change Log
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).
This change log adheres to standards from [Keep a CHANGELOG](http://keepachangelog.com).

## [Unreleased]


## [2.2.0] - 2016-11-07
### Fixed
- Corrected a few gaffs in the auto-ignore logic to fix major performance issues
  with projects that did not explicitly ignore `node_modules`. ([#654])
- [`import/ignore` setting] was only being respected if the ignored module didn't start with
  an `import` or `export` JS statement
- [`prefer-default-export`]: fixed crash on export extensions ([#653])

## [2.1.0] - 2016-11-02
### Added
- Add [`no-named-default`] rule: style-guide rule to report use of unnecessarily named default imports ([#596], thanks [@ntdb])
- [`no-extraneous-dependencies`]: check globs against CWD + absolute path ([#602] + [#630], thanks [@ljharb])

### Fixed
- [`prefer-default-export`] handles flow `export type` ([#484] + [#639], thanks [@jakubsta])
- [`prefer-default-export`] handles re-exported default exports ([#609])
- Fix crash when using [`newline-after-import`] with decorators ([#592])
- Properly report [`newline-after-import`] when next line is a decorator
- Fixed documentation for the default values for the [`order`] rule ([#601])

## [2.0.1] - 2016-10-06
### Fixed
- Fixed code that relied on removed dependencies. ([#604])

## [2.0.0]! - 2016-09-30
### Added
- [`unambiguous`] rule: report modules that are not unambiguously ES modules.
- `recommended` shared config. Roughly `errors` and `warnings` mixed together,
  with some `parserOptions` in the mix. ([#402])
- `react` shared config: added `jsx: true` to `parserOptions.ecmaFeatures`.
- Added [`no-webpack-loader-syntax`] rule: forbid custom Webpack loader syntax in imports. ([#586], thanks [@fson]!)
- Add option `newlines-between: "ignore"` to [`order`] ([#519])
- Added [`no-unassigned-import`] rule ([#529])

### Breaking
- [`import/extensions` setting] defaults to `['.js']`. ([#306])
- [`import/ignore` setting] defaults to nothing, and ambiguous modules are ignored natively. This means importing from CommonJS modules will no longer be reported by [`default`], [`named`], or [`namespace`], regardless of `import/ignore`. ([#270])
- [`newline-after-import`]: Removed need for an empty line after an inline `require` call ([#570])
- [`order`]: Default value for `newlines-between` option is now `ignore` ([#519])

### Changed
- `imports-first` is renamed to [`first`]. `imports-first` alias will continue to
  exist, but may be removed in a future major release.
- Case-sensitivity: now specifically (and optionally) reported by [`no-unresolved`].
  Other rules will ignore case-mismatches on paths on case-insensitive filesystems. ([#311])

### Fixed
- [`no-internal-modules`]: support `@`-scoped packages ([#577]+[#578], thanks [@spalger])

## [1.16.0] - 2016-09-22
### Added
- Added [`no-dynamic-require`] rule: forbid `require()` calls with expressions. ([#567], [#568])
- Added [`no-internal-modules`] rule: restrict deep package imports to specific folders. ([#485], thanks [@spalger]!)
- [`extensions`]: allow override of a chosen default with options object ([#555], thanks [@ljharb]!)

### Fixed
- [`no-named-as-default`] no longer false-positives on `export default from '...'` ([#566], thanks [@preco21])
- [`default`]: allow re-export of values from ignored files as default ([#545], thanks [@skyrpex])

## [1.15.0] - 2016-09-12
### Added
- Added an `allow` option to [`no-nodejs-modules`] to allow exceptions ([#452], [#509]).
- Added [`no-absolute-path`] rule ([#530], [#538])
- [`max-dependencies`] for specifying the maximum number of dependencies (both `import` and `require`) a module can have. (see [#489], thanks [@tizmagik])
- Added glob option to config for [`no-extraneous-dependencies`], after much bikeshedding. Thanks, [@knpwrs]! ([#527])

### Fixed
- [`no-named-as-default-member`] Allow default import to have a property named "default" ([#507], [#508], thanks [@jquense] for both!)

## [1.14.0] - 2016-08-22
### Added
- [`import/parsers` setting]: parse some dependencies (i.e. TypeScript!) with a different parser than the ESLint-configured parser. ([#503])

### Fixed
- [`namespace`] exception for get property from `namespace` import, which are re-export from commonjs module ([#499] fixes [#416], thanks [@wKich])

## [1.13.0] - 2016-08-11
### Added
- `allowComputed` option for [`namespace`] rule. If set to `true`, won't report
  computed member references to namespaces. (see [#456])

### Changed
- Modified [`no-nodejs-modules`] error message to include the module's name ([#453], [#461])

### Fixed
- [`import/extensions` setting] is respected in spite of the appearance of imports
  in an imported file. (fixes [#478], thanks [@rhys-vdw])

## [1.12.0] - 2016-07-26
### Added
- [`import/external-module-folders` setting]: a possibility to configure folders for "external" modules ([#444], thanks [@zloirock])

## [1.11.1] - 2016-07-20
### Fixed
- [`newline-after-import`] exception for `switch` branches with `require`s iff parsed as `sourceType:'module'`.
  (still [#441], thanks again [@ljharb])

## [1.11.0] - 2016-07-17
### Added
- Added an `peerDependencies` option to [`no-extraneous-dependencies`] to allow/forbid peer dependencies ([#423], [#428], thanks [@jfmengels]!).

### Fixed
- [`newline-after-import`] exception for multiple `require`s in an arrow
  function expression (e.g. `() => require('a') || require('b')`). ([#441], thanks [@ljharb])

## [1.10.3] - 2016-07-08
### Fixed
- removing `Symbol` dependencies (i.e. `for-of` loops) due to Node 0.10 polyfill
  issue (see [#415]). Should not make any discernible semantic difference.

## [1.10.2] - 2016-07-04
### Fixed
- Something horrible happened during `npm prepublish` of 1.10.1.
  Several `rm -rf node_modules && npm i` and `gulp clean && npm prepublish`s later, it is rebuilt and republished as 1.10.2. Thanks [@rhettlivingston] for noticing and reporting!

## [1.10.1] - 2016-07-02 [YANKED]
### Added
- Officially support ESLint 3.x. (peerDependencies updated to `2.x - 3.x`)

## [1.10.0] - 2016-06-30
### Added
- Added new rule [`no-restricted-paths`]. ([#155]/[#371], thanks [@lo1tuma])
- [`import/core-modules` setting]: allow configuration of additional module names,
  to be treated as builtin modules (a la `path`, etc. in Node). ([#275] + [#365], thanks [@sindresorhus] for driving)
- React Native shared config (based on comment from [#283])

### Fixed
- Fixed crash with `newline-after-import` related to the use of switch cases. (fixes [#386], thanks [@ljharb] for reporting) ([#395])

## [1.9.2] - 2016-06-21
### Fixed
- Issues with ignored/CJS files in [`export`] and [`no-deprecated`] rules. ([#348], [#370])

## [1.9.1] - 2016-06-16
### Fixed
- Reordered precedence for loading resolvers. ([#373])

## [1.9.0] - 2016-06-10
### Added
- Added support TomDoc comments to [`no-deprecated`]. ([#321], thanks [@josh])
- Added support for loading custom resolvers ([#314], thanks [@le0nik])

### Fixed
- [`prefer-default-export`] handles `export function` and `export const` in same file ([#359], thanks [@scottnonnenberg])

## [1.8.1] - 2016-05-23
### Fixed
- `export * from 'foo'` now properly ignores a `default` export from `foo`, if any. ([#328]/[#332], thanks [@jkimbo])
  This impacts all static analysis of imported names. ([`default`], [`named`], [`namespace`], [`export`])
- Make [`order`]'s `newline-between` option handle multiline import statements ([#313], thanks [@singles])
- Make [`order`]'s `newline-between` option handle not assigned import statements ([#313], thanks [@singles])
- Make [`order`]'s `newline-between` option ignore `require` statements inside object literals ([#313], thanks [@singles])
- [`prefer-default-export`] properly handles deep destructuring, `export * from ...`, and files with no exports. ([#342]+[#343], thanks [@scottnonnenberg])

## [1.8.0] - 2016-05-11
### Added
- [`prefer-default-export`], new rule. ([#308], thanks [@gavriguy])

### Fixed
- Ignore namespace / ES7 re-exports in [`no-mutable-exports`]. ([#317], fixed by [#322]. thanks [@borisyankov] + [@jfmengels])
- Make [`no-extraneous-dependencies`] handle scoped packages ([#316], thanks [@jfmengels])

## [1.7.0] - 2016-05-06
### Added
- [`newline-after-import`], new rule. ([#245], thanks [@singles])
- Added an `optionalDependencies` option to [`no-extraneous-dependencies`] to allow/forbid optional dependencies ([#266], thanks [@jfmengels]).
- Added `newlines-between` option to [`order`] rule ([#298], thanks [@singles])
- add [`no-mutable-exports`] rule ([#290], thanks [@josh])
- [`import/extensions` setting]: a list of file extensions to parse as modules
  and search for `export`s. If unspecified, all extensions are considered valid (for now).
  In v2, this will likely default to `['.js', MODULE_EXT]`. ([#297], to fix [#267])

### Fixed
- [`extensions`]: fallback to source path for extension enforcement if imported
  module is not resolved. Also, never report for builtins (i.e. `path`). ([#296])

## [1.6.1] - 2016-04-28
### Fixed
- [`no-named-as-default-member`]: don't crash on rest props. ([#281], thanks [@SimenB])
- support for Node 6: don't pass `null` to `path` functions.
  Thanks to [@strawbrary] for bringing this up ([#272]) and adding OSX support to the Travis
  config ([#288]).

## [1.6.0] - 2016-04-25
### Added
- add [`no-named-as-default-member`] to `warnings` canned config
- add [`no-extraneous-dependencies`] rule ([#241], thanks [@jfmengels])
- add [`extensions`] rule ([#250], thanks [@lo1tuma])
- add [`no-nodejs-modules`] rule ([#261], thanks [@jfmengels])
- add [`order`] rule ([#247], thanks [@jfmengels])
- consider `resolve.fallback` config option in the webpack resolver ([#254])

### Changed
- [`imports-first`] now allows directives (i.e. `'use strict'`) strictly before
  any imports ([#256], thanks [@lemonmade])

### Fixed
- [`named`] now properly ignores the source module if a name is re-exported from
  an ignored file (i.e. `node_modules`). Also improved the reported error. (thanks to [@jimbolla] for reporting)
- [`no-named-as-default-member`] had a crash on destructuring in loops (thanks for heads up from [@lemonmade])

## [1.5.0] - 2016-04-18
### Added
- report resolver errors at the top of the linted file
- add [`no-namespace`] rule ([#239], thanks [@singles])
- add [`no-named-as-default-member`] rule ([#243], thanks [@dmnd])

### Changed
- Rearranged rule groups in README in preparation for more style guide rules

### Removed
- support for Node 0.10, via `es6-*` ponyfills. Using native Map/Set/Symbol.

## [1.4.0] - 2016-03-25
### Added
- Resolver plugin interface v2: more explicit response format that more clearly covers the found-but-core-module case, where there is no path.
  Still backwards-compatible with the original version of the resolver spec.
- [Resolver documentation](./resolvers/README.md)

### Changed
- using `package.json/files` instead of `.npmignore` for package file inclusion ([#228], thanks [@mathieudutour])
- using `es6-*` ponyfills instead of `babel-runtime`

## [1.3.0] - 2016-03-20
Major perf improvements. Between parsing only once and ignoring gigantic, non-module `node_modules`,
there is very little added time.

My test project takes 17s to lint completely, down from 55s, when using the
memoizing parser, and takes only 27s with naked `babel-eslint` (thus, reparsing local modules).

### Added
- This change log ([#216])
- Experimental memoizing [parser](./memo-parser/README.md)

### Fixed
- Huge reduction in execution time by _only_ ignoring [`import/ignore` setting] if
  something that looks like an `export` is detected in the module content.

## [1.2.0] - 2016-03-19
Thanks @lencioni for identifying a huge amount of rework in resolve and kicking
off a bunch of memoization.

I'm seeing 62% improvement over my normal test codebase when executing only
[`no-unresolved`] in isolation, and ~35% total reduction in lint time.

### Changed
- added caching to core/resolve via [#214], configured via [`import/cache` setting]

## [1.1.0] - 2016-03-15
### Added
- Added an [`ignore`](./docs/rules/no-unresolved.md#ignore) option to [`no-unresolved`] for those pesky files that no
resolver can find. (still prefer enhancing the Webpack and Node resolvers to
using it, though). See [#89] for details.

## [1.0.4] - 2016-03-11
### Changed
- respect hoisting for deep namespaces ([`namespace`]/[`no-deprecated`]) ([#211])

### Fixed
- don't crash on self references ([#210])
- correct cache behavior in `eslint_d` for deep namespaces ([#200])

## [1.0.3] - 2016-02-26
### Changed
- no-deprecated follows deep namespaces ([#191])

### Fixed
- [`namespace`] no longer flags modules with only a default export as having no
names. (ns.default is valid ES6)

## [1.0.2] - 2016-02-26
### Fixed
- don't parse imports with no specifiers ([#192])

## [1.0.1] - 2016-02-25
### Fixed
- export `stage-0` shared config
- documented [`no-deprecated`]
- deep namespaces are traversed regardless of how they get imported ([#189])

## [1.0.0] - 2016-02-24
### Added
- [`no-deprecated`]: WIP rule to let you know at lint time if you're using
deprecated functions, constants, classes, or modules.

### Changed
- [`namespace`]: support deep namespaces ([#119] via [#157])

## [1.0.0-beta.0] - 2016-02-13
### Changed
- support for (only) ESLint 2.x
- no longer needs/refers to `import/parser` or `import/parse-options`. Instead,
ESLint provides the configured parser + options to the rules, and they use that
to parse dependencies.

### Removed
- `babylon` as default import parser (see Breaking)

## [0.13.0] - 2016-02-08
### Added
- [`no-commonjs`] rule
- [`no-amd`] rule

### Removed
- Removed vestigial `no-require` rule. [`no-commonjs`] is more complete.

## [0.12.2] - 2016-02-06 [YANKED]
Unpublished from npm and re-released as 0.13.0. See [#170].

## [0.12.1] - 2015-12-17
### Changed
- Broke docs for rules out into individual files.

## [0.12.0] - 2015-12-14
### Changed
- Ignore [`import/ignore` setting] if exports are actually found in the parsed module. Does
this to support use of `jsnext:main` in `node_modules` without the pain of
managing an allow list or a nuanced deny list.

## [0.11.0] - 2015-11-27
### Added
- Resolver plugins. Now the linter can read Webpack config, properly follow
aliases and ignore externals, dismisses inline loaders, etc. etc.!

## Earlier releases (0.10.1 and younger)
See [GitHub release notes](https://github.com/benmosher/eslint-plugin-import/releases?after=v0.11.0)
for info on changes for earlier releases.


[`import/cache` setting]: ./README.md#importcache
[`import/ignore` setting]: ./README.md#importignore
[`import/extensions` setting]: ./README.md#importextensions
[`import/parsers` setting]: ./README.md#importparsers
[`import/core-modules` setting]: ./README.md#importcore-modules
[`import/external-module-folders` setting]: ./README.md#importexternal-module-folders

[`no-unresolved`]: ./docs/rules/no-unresolved.md
[`no-deprecated`]: ./docs/rules/no-deprecated.md
[`no-commonjs`]: ./docs/rules/no-commonjs.md
[`no-amd`]: ./docs/rules/no-amd.md
[`namespace`]: ./docs/rules/namespace.md
[`no-namespace`]: ./docs/rules/no-namespace.md
[`no-named-default`]: ./docs/rules/no-named-default.md
[`no-named-as-default`]: ./docs/rules/no-named-as-default.md
[`no-named-as-default-member`]: ./docs/rules/no-named-as-default-member.md
[`no-extraneous-dependencies`]: ./docs/rules/no-extraneous-dependencies.md
[`extensions`]: ./docs/rules/extensions.md
[`first`]: ./docs/rules/first.md
[`imports-first`]: ./docs/rules/first.md
[`no-nodejs-modules`]: ./docs/rules/no-nodejs-modules.md
[`order`]: ./docs/rules/order.md
[`named`]: ./docs/rules/named.md
[`default`]: ./docs/rules/default.md
[`export`]: ./docs/rules/export.md
[`newline-after-import`]: ./docs/rules/newline-after-import.md
[`no-mutable-exports`]: ./docs/rules/no-mutable-exports.md
[`prefer-default-export`]: ./docs/rules/prefer-default-export.md
[`no-restricted-paths`]: ./docs/rules/no-restricted-paths.md
[`no-absolute-path`]: ./docs/rules/no-absolute-path.md
[`max-dependencies`]: ./docs/rules/max-dependencies.md
[`no-internal-modules`]: ./docs/rules/no-internal-modules.md
[`no-dynamic-require`]: ./docs/rules/no-dynamic-require.md
[`no-webpack-loader-syntax`]: ./docs/rules/no-webpack-loader-syntax.md
[`no-unassigned-import`]: ./docs/rules/no-unassigned-import.md
[`unambiguous`]: ./docs/rules/unambiguous.md

[#654]: https://github.com/benmosher/eslint-plugin-import/pull/654
[#639]: https://github.com/benmosher/eslint-plugin-import/pull/639
[#630]: https://github.com/benmosher/eslint-plugin-import/pull/630
[#596]: https://github.com/benmosher/eslint-plugin-import/pull/596
[#586]: https://github.com/benmosher/eslint-plugin-import/pull/586
[#578]: https://github.com/benmosher/eslint-plugin-import/pull/578
[#568]: https://github.com/benmosher/eslint-plugin-import/pull/568
[#555]: https://github.com/benmosher/eslint-plugin-import/pull/555
[#538]: https://github.com/benmosher/eslint-plugin-import/pull/538
[#527]: https://github.com/benmosher/eslint-plugin-import/pull/527
[#509]: https://github.com/benmosher/eslint-plugin-import/pull/509
[#508]: https://github.com/benmosher/eslint-plugin-import/pull/508
[#503]: https://github.com/benmosher/eslint-plugin-import/pull/503
[#499]: https://github.com/benmosher/eslint-plugin-import/pull/499
[#489]: https://github.com/benmosher/eslint-plugin-import/pull/489
[#485]: https://github.com/benmosher/eslint-plugin-import/pull/485
[#461]: https://github.com/benmosher/eslint-plugin-import/pull/461
[#444]: https://github.com/benmosher/eslint-plugin-import/pull/444
[#428]: https://github.com/benmosher/eslint-plugin-import/pull/428
[#395]: https://github.com/benmosher/eslint-plugin-import/pull/395
[#371]: https://github.com/benmosher/eslint-plugin-import/pull/371
[#365]: https://github.com/benmosher/eslint-plugin-import/pull/365
[#359]: https://github.com/benmosher/eslint-plugin-import/pull/359
[#343]: https://github.com/benmosher/eslint-plugin-import/pull/343
[#332]: https://github.com/benmosher/eslint-plugin-import/pull/332
[#322]: https://github.com/benmosher/eslint-plugin-import/pull/322
[#321]: https://github.com/benmosher/eslint-plugin-import/pull/321
[#316]: https://github.com/benmosher/eslint-plugin-import/pull/316
[#308]: https://github.com/benmosher/eslint-plugin-import/pull/308
[#298]: https://github.com/benmosher/eslint-plugin-import/pull/298
[#297]: https://github.com/benmosher/eslint-plugin-import/pull/297
[#296]: https://github.com/benmosher/eslint-plugin-import/pull/296
[#290]: https://github.com/benmosher/eslint-plugin-import/pull/290
[#289]: https://github.com/benmosher/eslint-plugin-import/pull/289
[#288]: https://github.com/benmosher/eslint-plugin-import/pull/288
[#287]: https://github.com/benmosher/eslint-plugin-import/pull/287
[#278]: https://github.com/benmosher/eslint-plugin-import/pull/278
[#261]: https://github.com/benmosher/eslint-plugin-import/pull/261
[#256]: https://github.com/benmosher/eslint-plugin-import/pull/256
[#254]: https://github.com/benmosher/eslint-plugin-import/pull/254
[#250]: https://github.com/benmosher/eslint-plugin-import/pull/250
[#247]: https://github.com/benmosher/eslint-plugin-import/pull/247
[#245]: https://github.com/benmosher/eslint-plugin-import/pull/245
[#243]: https://github.com/benmosher/eslint-plugin-import/pull/243
[#241]: https://github.com/benmosher/eslint-plugin-import/pull/241
[#239]: https://github.com/benmosher/eslint-plugin-import/pull/239
[#228]: https://github.com/benmosher/eslint-plugin-import/pull/228
[#211]: https://github.com/benmosher/eslint-plugin-import/pull/211
[#164]: https://github.com/benmosher/eslint-plugin-import/pull/164
[#157]: https://github.com/benmosher/eslint-plugin-import/pull/157
[#314]: https://github.com/benmosher/eslint-plugin-import/pull/314

[#653]: https://github.com/benmosher/eslint-plugin-import/issues/653
[#609]: https://github.com/benmosher/eslint-plugin-import/issues/609
[#604]: https://github.com/benmosher/eslint-plugin-import/issues/604
[#602]: https://github.com/benmosher/eslint-plugin-import/issues/602
[#601]: https://github.com/benmosher/eslint-plugin-import/issues/601
[#592]: https://github.com/benmosher/eslint-plugin-import/issues/592
[#577]: https://github.com/benmosher/eslint-plugin-import/issues/577
[#570]: https://github.com/benmosher/eslint-plugin-import/issues/570
[#567]: https://github.com/benmosher/eslint-plugin-import/issues/567
[#566]: https://github.com/benmosher/eslint-plugin-import/issues/566
[#545]: https://github.com/benmosher/eslint-plugin-import/issues/545
[#530]: https://github.com/benmosher/eslint-plugin-import/issues/530
[#529]: https://github.com/benmosher/eslint-plugin-import/issues/529
[#519]: https://github.com/benmosher/eslint-plugin-import/issues/519
[#507]: https://github.com/benmosher/eslint-plugin-import/issues/507
[#484]: https://github.com/benmosher/eslint-plugin-import/issues/484
[#478]: https://github.com/benmosher/eslint-plugin-import/issues/478
[#456]: https://github.com/benmosher/eslint-plugin-import/issues/456
[#453]: https://github.com/benmosher/eslint-plugin-import/issues/453
[#452]: https://github.com/benmosher/eslint-plugin-import/issues/452
[#441]: https://github.com/benmosher/eslint-plugin-import/issues/441
[#423]: https://github.com/benmosher/eslint-plugin-import/issues/423
[#416]: https://github.com/benmosher/eslint-plugin-import/issues/416
[#415]: https://github.com/benmosher/eslint-plugin-import/issues/415
[#402]: https://github.com/benmosher/eslint-plugin-import/issues/402
[#386]: https://github.com/benmosher/eslint-plugin-import/issues/386
[#373]: https://github.com/benmosher/eslint-plugin-import/issues/373
[#370]: https://github.com/benmosher/eslint-plugin-import/issues/370
[#348]: https://github.com/benmosher/eslint-plugin-import/issues/348
[#342]: https://github.com/benmosher/eslint-plugin-import/issues/342
[#328]: https://github.com/benmosher/eslint-plugin-import/issues/328
[#317]: https://github.com/benmosher/eslint-plugin-import/issues/317
[#313]: https://github.com/benmosher/eslint-plugin-import/issues/313
[#311]: https://github.com/benmosher/eslint-plugin-import/issues/311
[#306]: https://github.com/benmosher/eslint-plugin-import/issues/306
[#286]: https://github.com/benmosher/eslint-plugin-import/issues/286
[#283]: https://github.com/benmosher/eslint-plugin-import/issues/283
[#281]: https://github.com/benmosher/eslint-plugin-import/issues/281
[#275]: https://github.com/benmosher/eslint-plugin-import/issues/275
[#272]: https://github.com/benmosher/eslint-plugin-import/issues/272
[#270]: https://github.com/benmosher/eslint-plugin-import/issues/270
[#267]: https://github.com/benmosher/eslint-plugin-import/issues/267
[#266]: https://github.com/benmosher/eslint-plugin-import/issues/266
[#216]: https://github.com/benmosher/eslint-plugin-import/issues/216
[#214]: https://github.com/benmosher/eslint-plugin-import/issues/214
[#210]: https://github.com/benmosher/eslint-plugin-import/issues/210
[#200]: https://github.com/benmosher/eslint-plugin-import/issues/200
[#192]: https://github.com/benmosher/eslint-plugin-import/issues/192
[#191]: https://github.com/benmosher/eslint-plugin-import/issues/191
[#189]: https://github.com/benmosher/eslint-plugin-import/issues/189
[#170]: https://github.com/benmosher/eslint-plugin-import/issues/170
[#155]: https://github.com/benmosher/eslint-plugin-import/issues/155
[#119]: https://github.com/benmosher/eslint-plugin-import/issues/119
[#89]: https://github.com/benmosher/eslint-plugin-import/issues/89

[Unreleased]: https://github.com/benmosher/eslint-plugin-import/compare/v2.2.0...HEAD
[2.2.0]: https://github.com/benmosher/eslint-plugin-import/compare/v2.1.0...v2.2.0
[2.1.0]: https://github.com/benmosher/eslint-plugin-import/compare/v2.0.1...v2.1.0
[2.0.1]: https://github.com/benmosher/eslint-plugin-import/compare/v2.0.0...v2.0.1
[2.0.0]: https://github.com/benmosher/eslint-plugin-import/compare/v1.16.0...v2.0.0
[1.16.0]: https://github.com/benmosher/eslint-plugin-import/compare/v1.15.0...v1.16.0
[1.15.0]: https://github.com/benmosher/eslint-plugin-import/compare/v1.14.0...v1.15.0
[1.14.0]: https://github.com/benmosher/eslint-plugin-import/compare/v1.13.0...v1.14.0
[1.13.0]: https://github.com/benmosher/eslint-plugin-import/compare/v1.12.0...v1.13.0
[1.12.0]: https://github.com/benmosher/eslint-plugin-import/compare/v1.11.1...v1.12.0
[1.11.1]: https://github.com/benmosher/eslint-plugin-import/compare/v1.11.0...v1.11.1
[1.11.0]: https://github.com/benmosher/eslint-plugin-import/compare/v1.10.3...v1.11.0
[1.10.3]: https://github.com/benmosher/esl