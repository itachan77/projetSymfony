<?php
namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;



//L'utilisateur est redirigé vers le login s'il n'est pas autorisé à accéder via son mot de passe aux pages commencant par admin.
class AccessDeniedHandler extends AbstractController implements AccessDeniedHandlerInterface
{

        public function handle(Request $request, AccessDeniedException $accessDeniedException)
                {
                $session=$request->getSession();
                $session->getFlashBag()->add('message','Vous n\'avez pas les droits suffisants pour accéder à cette page');
                
                $session->set('statut','danger');
                
                
                return $this->redirect($this->generateUrl('app_login'));
                }


                        
                        



}

?>

