pipeline {
    agent {
        docker {
            image 'php:8.0-cli'
        }
    }

    stages {
        stage('Build') {
            steps {
                sh 'composer install'
            }
        }

        stage('Test') {
            steps {
                sh 'php vendor/bin/phpunit'
            }
        }
    }
}
