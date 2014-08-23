'use strict';
 
/**
 * Grunt Module
 */
module.exports = function(grunt) {
	
grunt.initConfig({

 	pkg: grunt.file.readJSON('package.json'),
 	sass: {
  		dist: {
  		  options: {
  		    style: 'compressed',
  		    compass: false
  		  },
  		  files: {
  		    'style.min.css': 'sass/style.scss'
  		  }
  		}
		},
  concat: {
      options: {
        separator: ';',
      },
      dist: {
        src: ['js/vendor/*.js', 'js/main.js'],
        dest: 'js/scripts.min.js',
      },
    },
  uglify: {
      dist: {
        files: {
          'js/scripts.min.js': 'js/scripts.min.js'
        },
        options: {
          // JS source map: to enable, uncomment the lines below and update sourceMappingURL based on your install
          // sourceMap: 'assets/js/scripts.min.js.map',
          // sourceMappingURL: '/app/themes/roots/assets/js/scripts.min.js.map'
        }
      }
    },
  autoprefixer: {
      options: {
        browsers: ['last 2 versions', 'ie 9']
      },
      single_file: {
        src: 'style.min.css',
        dest: 'style.min.css'
      }
    },
  imagemin: {
      dynamic: {
        files: [{
          expand: true,
          cwd: 'img/',
          src: ['**/*.{png,jpg,gif}'],
          dest: 'img/'
        }]
      }
  },
  watch: {
      options: {
      livereload: true,
      },
      imagemin: {
        files: [
          'img/*.jpg', 
          'img/*.png'
        ],
        tasks: ['imagemin'] //TODO: why isn't this working? grunt task on it's own works
      },
      sass: {
        files: [
          'sass/*.scss',
          'sass/**/*.scss'
        ],
        tasks: ['sass', 'autoprefixer']
      },
      js: {
        files: [
          'js/main.js',
          'js/vendor/*.js'
        ],
        tasks: ['concat', 'uglify']
      },
    },
    clean: {
      dist: [
        'style.min.css',
        'js/scripts.min.js'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-imagemin');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'sass',
    'concat',
    'uglify',
    'autoprefixer',
    'imagemin'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};
