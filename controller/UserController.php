<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * Description of userController
 *
 * @author travail
 */
class UserController extends Controller {

//put your code here
    private $modUser = null;

    public function login() { //Permet la connexion de l'utilisateur quelque soit son role
        $d['message'] = "Entrez votre login et votre mot de passe";
        if (isset($_POST['singlebutton'])) {
            if (is_null($this->modUser)) {
                if ($_POST['role'] == 'Prof') {
                    $this->modUser = $this->loadModel('User');
                }
                if ($_POST['role'] == 'Etu') {
                    $this->modUser = $this->loadModel('UserEtu');
                }
            }

            $donnees = array();
//on n'envoie pas à la méthode update que les boutons où autres      
            
            if ($_POST['role'] == 'Prof') {
                $donnees['p_login'] = $_POST['login'];
            } 
            else {
                $donnees['e_login'] = $_POST['login'];
            }
            
            $d['user'] = $this->modUser->findFirst(array('conditions' => $donnees));

            if ($_POST['role'] == 'Prof') {
                
                if (isset($d['user']->p_login)) {
                    if ($d['user']->p_mdp == sha1($_POST['mdp'])){
                        $d['message'] = 'Bonjour ' . $d['user']->p_prenom . ' ' . $d['user']->p_nom;

                        Session::set('login', $d['user']->p_login);
                        Session::set('code', $d['user']->p_code);
                        Session::set('nom', $d['user']->p_nom);
                        Session::set('prenom', $d['user']->p_prenom);
                        Session::set('mdp', $d['user']->p_mdp);
                        Session::set('role', 'Professeur');
                        // echo 'session login',Session::get('login');
                        //redirection vers l'écran d'accueil
                        $this->redirect('/accueil/accueil');

                        header("$url");
                    } else {
                        $d['message'] = 'Mot de passe incorrect du professeur';
                        Session::set('password', null);
                    }
                } else {
                    $d['message'] = 'Login incorrect du professeur';
                    Session::set('login', null);
                }
            }
            if ($_POST['role'] == 'Etu') {
                if (isset($d['user']->e_login)) {
                    if ($d['user']->e_mdp == sha1($_POST['mdp'])){
                        $d['message'] = 'Bonjour ' . $d['user']->e_prenom . ' ' . $d['user']->e_nom;

                        Session::set('login', $d['user']->e_login);
                        Session::set('code', $d['user']->e_code);
                        Session::set('nom', $d['user']->e_nom);
                        Session::set('prenom', $d['user']->e_prenom);
                        Session::set('mdp', $d['user']->e_mdp);
                        Session::set('role', 'Etudiant');
                        // echo 'session login',Session::get('login');
                        //redirection vers l'écran d'accueil
                        $this->redirect('/accueil/accueil');

                        header("$url");
                    } else {
                        $d['message'] = 'Mot de passe incorrect de l\'étudiant';
                        Session::set('login', null);
                    }
                } else {
                    $d['message'] = 'Login incorrect de l\'étudiant';
                    Session::set('login', null);
                }
            }
        }
        $this->set($d);
    }

    public function logout() { //Permet la deconnexion de l'utilisateur
        $d['message'] = "Entrez votre login et votre mot de passe";
        Session::set('login', null);
        Session::set('code', null);
        Session::set('nom', null);
        Session::set('prenom', null);
        Session::set('mdp', null);
        Session::set('role', null);
        
        $this->set($d);
    }
    
    function render($view){ //Permet l'affichage de la vue connexion lors de la déconnexion
        if ($view == 'logout'){
            $view = 'login';
        }
        parent::render($view);
    }
    
}
