<?php

namespace ContainerOxdelBS;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{

    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder2c345 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerd61ff = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesbabd3 = [
        
    ];

    public function getConnection()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'getConnection', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'getMetadataFactory', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'getExpressionBuilder', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'beginTransaction', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->beginTransaction();
    }

    public function getCache()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'getCache', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->getCache();
    }

    public function transactional($func)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'transactional', array('func' => $func), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->transactional($func);
    }

    public function commit()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'commit', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->commit();
    }

    public function rollback()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'rollback', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'getClassMetadata', array('className' => $className), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'createQuery', array('dql' => $dql), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'createNamedQuery', array('name' => $name), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'createQueryBuilder', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'flush', array('entity' => $entity), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'clear', array('entityName' => $entityName), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->clear($entityName);
    }

    public function close()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'close', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->close();
    }

    public function persist($entity)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'persist', array('entity' => $entity), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'remove', array('entity' => $entity), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'refresh', array('entity' => $entity), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'detach', array('entity' => $entity), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'merge', array('entity' => $entity), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'getRepository', array('entityName' => $entityName), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'contains', array('entity' => $entity), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'getEventManager', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'getConfiguration', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'isOpen', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'getUnitOfWork', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'getProxyFactory', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'initializeObject', array('obj' => $obj), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'getFilters', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'isFiltersStateClean', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'hasFilters', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return $this->valueHolder2c345->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializerd61ff = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder2c345) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder2c345 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder2c345->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, '__get', ['name' => $name], $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        if (isset(self::$publicPropertiesbabd3[$name])) {
            return $this->valueHolder2c345->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder2c345;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder2c345;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder2c345;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder2c345;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, '__isset', array('name' => $name), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder2c345;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder2c345;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, '__unset', array('name' => $name), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder2c345;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder2c345;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, '__clone', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        $this->valueHolder2c345 = clone $this->valueHolder2c345;
    }

    public function __sleep()
    {
        $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, '__sleep', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;

        return array('valueHolder2c345');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerd61ff = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerd61ff;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerd61ff && ($this->initializerd61ff->__invoke($valueHolder2c345, $this, 'initializeProxy', array(), $this->initializerd61ff) || 1) && $this->valueHolder2c345 = $valueHolder2c345;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder2c345;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder2c345;
    }


}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
