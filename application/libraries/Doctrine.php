<?php
include_once APPPATH.'third_party/Doctrine/autoload.php';

use Doctrine\Common\ClassLoader,
    Doctrine\Common\Annotations\Annotation,
    Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\EntityManager;

/**
 * Doctrine for CodeIgniter
 *
 * @author  Latte Cake <latte@latteCake.com>
 * @link    http://lattecake.com
 */
class Doctrine
{

    public $em;

    public function __construct()
    {
        // Load the database configuration from CodeIgniter
        require APPPATH . 'config/database.php';

        $connection_options = array(
            'driver'		=> 'pdo_mysql',
            'user'			=> $db['mysql']['username'],
            'password'		=> $db['mysql']['password'],
            'host'			=> $db['mysql']['hostname'],
            'dbname'		=> $db['mysql']['database'],
            'charset'		=> $db['mysql']['char_set'],
            'driverOptions'	=> array(
                'charset'	=> $db['mysql']['char_set'],
            ),
        );

        // With this configuration, your model files need to be in application/models/Entity
        // e.g. Creating a new Entity\User loads the class from application/models/Entity/User.php
        $models_namespace = 'Entity';
        $models_path = APPPATH . 'models';
        $proxies_dir = APPPATH . 'models/Proxies';
        $metadata_paths = array(APPPATH . 'models/Entity');

        // Set $dev_mode to TRUE to disable caching while you develop
        $dev_mode = true;

        // If you want to use a different metadata driver, change createAnnotationMetadataConfiguration
        // to createXMLMetadataConfiguration or createYAMLMetadataConfiguration.
        $config = Setup::createAnnotationMetadataConfiguration($metadata_paths, $dev_mode, $proxies_dir);
        $this->em = EntityManager::create($connection_options, $config);

        $loader = new ClassLoader($models_namespace, $models_path);
        $loader->register();
    }
}
