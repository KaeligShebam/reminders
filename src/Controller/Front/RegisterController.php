<?php

namespace App\Controller\Front;

use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{

    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/inscription", name="register")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder, MailerInterface $mailer){
        $user = new User();

        $form = $this->createForm(RegisterType:: class, $user);
        $notification = null;

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $password = $encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($password);

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            $email = (new Email())
                ->from('support@shebam.fr')
                ->to($user->getEmail())
                ->subject('Welcome to the Space Bar!')
                ->text("Nice to meet you {$user->getFirstname()}! ❤️");
            

            $notification = 'Tu es désormais inscris sur le site';
            return $this->redirectToRoute('register_message_success');

    }

        return $this->render('front/register/index.html.twig',[
            'user' => $user,
            'form' => $form->createView(),
            'notification' => $notification
        ]);

        return $this->redirectToRoute('app_login');
    }
    /**
     * @Route("/inscription/tu-es-bien-inscris", name="register_message_success")
     */
    public function registerOk(): Response
    {
        return $this->render('front/register/register_message_success.twig');
    }
    
}
