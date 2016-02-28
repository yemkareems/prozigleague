<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\View\Model\ViewModel;

class TeamController extends BaseController
{
    public function listAction() {

        $config = $this->getServiceLocator()->get('config');

        $team = $this->getEntityManager()->getRepository('Application\Entity\Team')->findAll(array("id" => "DESC"));
        foreach ($team as $teamObj) {
            $list[] = array(
                'id' => $teamObj->getId(),
                'name' => $teamObj->getName(),
                'image'  => $config['server'].'/'.$teamObj->getUri()
            );

        }
        return new ViewModel(array('list' => $list));

    }

    public function playersAction() {

        $config = $this->getServiceLocator()->get('config');
        $id = $this->params()->fromRoute('id');  // From RouteMatch

        $team = $this->getEntityManager()->getRepository('Application\Entity\Team')->findOneBy(array('id' => $id ),array("id" => "DESC"));
        foreach ($team->getPlayers() as $playerObj) {
            $list[] = array(
                'id' => $playerObj->getId(),
                'firstname' => $playerObj->getFirstname(),
                'lastname' => $playerObj->getLastname(),
                'image'  => $config['server'].'/'.$playerObj->getUri()
            );

        }
        return new ViewModel(array('list' => $list));

    }
}
