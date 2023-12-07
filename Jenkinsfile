pipeline {
    agent {
        docker {
            image 'php:8.2-cli'
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
