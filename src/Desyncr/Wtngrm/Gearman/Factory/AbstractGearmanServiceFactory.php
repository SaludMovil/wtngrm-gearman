<?php
/**
 * Desyncr\Wtngrm\Gearman\Factory
 *
 * PHP version 5.4
 *
 * @category General
 * @package  General
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @version  GIT:<>
 * @link     https://github.com/desyncr
 */
namespace Desyncr\Wtngrm\Gearman\Factory;

use Desyncr\Wtngrm\Gearman\Service\GearmanWorkerService;
use Desyncr\Wtngrm\Factory\ServiceFactory;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\AbstractOptions;

/**
 * Desyncr\Wtngrm\Gearman\Factory
 *
 * @category General
 * @package  Desyncr\Wtngrm\Gearman\Factory
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @link     https://github.com/desyncr
 */
abstract class AbstractGearmanServiceFactory extends ServiceFactory
{
    /**
     * createService
     *
     * @param ServiceLocatorInterface $serviceLocator Service locator instance
     *
     * @return array|GearmanWorkerService|mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $gearman = $this->getGearmanClient($serviceLocator);
        $options = $this->getGearmanOptions($serviceLocator);
        return $this->getGearmanService($gearman, $options);
    }

    /**
     * getGearmanService
     *
     * @param Object          $gearman Gearman service instance
     * @param AbstractOptions $options Adapter options
     *
     * @return mixed
     */
    abstract public function getGearmanService($gearman, AbstractOptions $options);

    /**
     * getGearmanOptions
     *
     * @param ServiceLocatorInterface $sm Service Locator
     *
     * @return mixed
     */
    abstract public function getGearmanOptions(ServiceLocatorInterface $sm);

    /**
     * getGearmanClient
     *
     * @param ServiceLocatorInterface $sm Service Locator
     *
     * @return mixed
     */
    abstract public function getGearmanClient(ServiceLocatorInterface $sm);
}
