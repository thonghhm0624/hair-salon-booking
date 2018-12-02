var buildSource_Path = 'D:/Projects/2018/FREE-LANCE/InnovativeNailDesign/www/webroot/js';
//var buildSource_Path = 'sources/';
var output_Path = 'output/';

console.log('\n***************************************************************\n');
console.log('buildSource_Path : '+buildSource_Path+'\n');
console.log('output_Path      : '+output_Path+'\n');
console.log('***************************************************************\n');

module.exports = function(grunt) {
    grunt.initConfig({

      	clean: {
             build: [output_Path],
        },
		
        copy: {
            main: {
                expand: true,
                cwd: output_Path,
                src: '**',
                dest: buildSource_Path,

            },
        },

        concat : {
            options: {
                separator: '\n\n//------------------------------------------\n',
                banner: '\n\n//------------------------------------------\n'
            },
            lib : {
                src: [	
						buildSource_Path + 'lib/jquery-1.11.1.min.js',
						buildSource_Path + 'lib/jquery.validate.min.js',
						buildSource_Path + 'lib/jquery.maxlength.min.js'
						buildSource_Path + 'lib/jquery.cookie.js'
						],
                dest: output_Path + 'all_lib.src.js'
            },
			app : {
                src: [					
						buildSource_Path + 'app/cls.Validation.js',
						buildSource_Path + 'app/cls.MainProcess.js'
					 ],
                dest: output_Path + 'all.src.js'
            }
        }, //concat
		uglify: {
			options: {
			  mangle: false,
			  compress : true
			},
			lib: {
			  files: {
				'output/all_lib.min.js': [ output_Path + 'all_lib.src.js']
			  }
			},
			app: {
			  files: {
				'output/all.min.js': [ output_Path + 'all.src.js']
			  }
			}
		},
		jsObfuscate: { //OK
			test: {
			  options: {
				concurrency: 2,
				keepLinefeeds: false,
				keepIndentations: false,
				encodeStrings: true,
				encodeNumbers: true,
				moveStrings: true,
				replaceNames: true,
				variableExclusions: [ '^_get_', '^_set_', '^_mtd_' ]
			  },
			  files: {
				'output/all.js': [
				  output_Path + 'all.min.js'
				]
			  }
			}
		},
        watch: {
            options: {
                spawn: false,
                //livereload: true //35729
				livereload: parseInt('357290'+Math.floor(Math.random()*9999),10)
            },
            scripts: {
                files: [buildSource_Path + 'app/*.js'],
                //tasks: ['clean', 'concat', 'uglify', 'jsObfuscate',  'copy'] // live
				tasks: ['clean','concat', 'uglify', 'jsObfuscate', 'copy'] // local
            }
        }
    }); //initConfig
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-clean');
 	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('js-obfuscator');
	
    //grunt.registerTask('default', ['clean', 'concat','uglify', 'jsObfuscate',  'copy', 'watch']);// live
	grunt.registerTask('default', ['clean','concat', 'uglify','jsObfuscate' , 'copy', 'watch']);// local

}; //wrapper function