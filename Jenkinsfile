pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                // Puedes agregar aquí cualquier paso necesario antes de ejecutar las pruebas
                script {
                    echo 'Building...'
                    // Agrega comandos adicionales si es necesario
                }
            }
        }

        stage('Test') {
            steps {
                script {
                    echo 'Running PHPUnit tests...'
                    sh 'composer install'
                    sh 'php vendor/bin/phpunit'
                    sh 'php artisan test'                                       
                }
            }
        }
    }
}
