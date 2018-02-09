<?php


namespace rollun\TuckerRocky\Decoders\Factory;


use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use rollun\TuckerRocky\Decoders\LineDecoder;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\AbstractFactoryInterface;

class LineDecoderAbstractFactory implements AbstractFactoryInterface
{

    const KEY = LineDecoderAbstractFactory::class;

    const KEY_SCHEMA = "schema";

    const IS_DEBUG_MODE = "isDebugMode";

    /**
     * Can the factory create an instance for the service?
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @return bool
     */
    public function canCreate(ContainerInterface $container, $requestedName)
    {
        try {
            $config = $container->get("config");
        } catch (NotFoundExceptionInterface $e) {
            return false;
        } catch (ContainerExceptionInterface $e) {
            return false;
        }
        return (
        isset($config[static::KEY][$requestedName])
        );
    }

    /**
     * Create an object
     * LineDecoderAbstractFactory::KEY => [
     *      "ItemSupercededDecoder" => [
     *          LineDecoderAbstractFactory::KEY_SCHEMA => Schema/ItemSuperceded::getSchema()
     *      ],
     *      "ItemMasterDecoder" => [
     *          LineDecoderAbstractFactory::KEY_SCHEMA => Schema/ItemMaster::getSchema()
     *          LineDecoderAbstractFactory::IS_DEBUG_MODE => true
     *      ]
     * ]
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return LineDecoder
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get("config");
        if (!isset($config[static::KEY][static::KEY_SCHEMA])) {
            throw new ServiceNotCreatedException("Schema not found is service config.");
        }
        $schema = $config[static::KEY][static::KEY_SCHEMA];

        if (isset($config[static::KEY][static::IS_DEBUG_MODE])) {
            return new LineDecoder($schema, $config[static::KEY][static::IS_DEBUG_MODE]);
        } else {
            return new LineDecoder($schema);
        }
    }
}