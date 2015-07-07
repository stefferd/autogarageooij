module.exports = function(grunt) {
  'use strict';

  require('load-grunt-tasks')(grunt);
  require('time-grunt')(grunt);

  var LessPluginAutoPrefix = require('less-plugin-autoprefix'),
    autoprefixPlugin = new LessPluginAutoPrefix({browsers: ["last 2 versions", 'IE >= 9']});

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    clean: {
      files: ['build/']
    },
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        src: 'js/main.js',
        dest: 'build/js/main.min.js'
      }
    },
    imagemin: {
      dynamic: {                         // Another target
        files: [{
          expand: true,                  // Enable dynamic expansion
          cwd: 'img/',                   // Src matches are relative to this path
          src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
          dest: 'build/img/'                  // Destination path prefix
        }]
      }
    },
    copy: {
      main: {
        files: [
          {
            expand: true,
            src: ['libs/**'],
            dest: 'build/'
          },
          {
            expand: true,
            src: ['js/tinymce/**'],
            dest: 'build/'
          }
        ]
      }
    },
    less: {
      development: {
        options: {
          paths: ["build/css"]
        },
        files: {
          "build/css/main.css": "less/main.less"
        }
      },
      production: {
        options: {
          paths: ["build/css"],
          plugins: [
            autoprefixPlugin
          ]
        },
        compress: true,
        files: {
          "build/css/main.css": "less/main.less"
        }
      }
    },
    watch: {
      css: {
        files: ['**/*.less'],
        task: ['default'],
        options: {
          spawn: false
        }
      },
      scripts: {
        files: ['js/**/*.js'],
        tasks: ['default']
      }
    },
    jshint: {
      options: {
        force: true,
        reporter: require('jshint-stylish'),
        jshintrc: true,
      },
      gruntfile: {
        src: 'Gruntfile.js'
      },
      src: {
        options: {
          ignores: [
            'js/tinymce/**/*.js'
          ]
        },
        src: ['js/**/*.js']
      }
    }
  });

  // Default task(s).
  grunt.registerTask('default', ['clean', 'uglify', 'imagemin', 'copy', 'less:development', 'jshint', 'watch']);

  grunt.registerTask('build', ['clean', 'uglify', 'imagemin', 'copy', 'less:production']);

};