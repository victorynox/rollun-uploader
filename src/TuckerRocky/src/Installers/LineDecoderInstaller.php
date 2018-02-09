<?php


namespace rollun\TuckerRocky\Installers;


use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use rollun\installer\Install\InstallerAbstract;
use rollun\TuckerRocky\Decoders\Factory\LineDecoderAbstractFactory;

class LineDecoderInstaller extends InstallerAbstract
{

    /**
     * install
     * @return array
     */
    public function install()
    {
        $config = [

            'dependencies' => [
                'aliases' => [],
                'invokables' => [],
                'factories' => [],
                'abstract_factories' => [
                    LineDecoderAbstractFactory::class
                ],
            ],
            LineDecoderAbstractFactory::KEY => [

            ],
        ];
        return $config;
    }

    /**
     * Clean all installation
     * @return void
     */
    public function uninstall()
    {

    }

    /**
     * Return true if install, or false else
     * @return bool
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function isInstall()
    {
        $config = $this->container->get("config");
        return (in_array(LineDecoderAbstractFactory::class, $config["abstract_factories"]));
    }

    /**
     * Return string with description of installable functional.
     * @param string $lang ; set select language for description getted.
     * @return string
     */
    public function getDescription($lang = "en")
    {
        switch ($lang) {
            case "ru":
                $description = "Содержит набор данных для тестов.";
                break;
            default:
                $description = "Does not exist.";
        }
        return $description;
    }
}