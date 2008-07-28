<?php

/**
 * friend actions.
 *
 * @package    OpenPNE
 * @subpackage friend
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class friendActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex($request)
  {
    $this->forward('default', 'module');
  }

 /**
  * Executes home action
  *
  * @param sfRequest $request A request object
  */
  public function executeHome($request)
  {
    $id = $request->getParameter('id', $this->getUser()->getMemberId());
    if ($id == $this->getUser()->getMemberId()) {
      $this->redirect('member/home');
    }

    $this->member = MemberPeer::retrieveByPk($id);

    return sfView::SUCCESS;
  }
}
