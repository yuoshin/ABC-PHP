<?php
namespace classes\business;

use classes\entity\User;
use classes\entity\Job;
use classes\entity\Forum;
use classes\entity\Topic;
use classes\entity\Answer;
use classes\entity\Thread;
use classes\entity\Message;
use classes\data\UserManagerDB;

class UserManager
{
    public static function getAllUsers(){
        return UserManagerDB::getAllUsers();
    }
    public function getUserByEmailPassword($email,$password){
        return UserManagerDB::getUserByEmailPassword($email,$password);
    }
    public function getUserByEmail($email){
        return UserManagerDB::getUserByEmail($email);
    }
    public function saveUser(User $user){
        UserManagerDB::saveUser($user);
    }
	public static function loginUser($email, $password){
        UserManagerDB::loginUser($email,$password);
    }
	public static function registerUser($firstName,$lastName,$email,$password){
        UserManagerDB::registerUser($firstName,$lastName,$email,$password);
    }
	public static function forgetPassword($remail,$rsent){
        UserManagerDB::forgetPassword($remail,$rsent);
    }
	public static function updateProfile($firstName,$lastName,$email,$password){
        UserManagerDB::updateProfile($firstName,$lastName,$email,$password);
    }
	public function searchUsers($query){
        return UserManagerDB::searchUsers($query);
	}
	public function getUserById($id){
        return UserManagerDB::getUserById($id);
    }
	public static function getAllJobs(){
        return UserManagerDB::getAllJobs();
    }
	public function getJobById($jobId){
        return UserManagerDB::getJobById($jobId);
    }
	public function searchJobs($query){
        return UserManagerDB::searchJobs($query);
	}
	public function saveApplication($user, $job){
        return UserManagerDB::saveApplication($user, $job);
	}
	public function getAllForum(){
        return UserManagerDB::getAllForum();
    }
	public function getForumById($id){
        return UserManagerDB::getForumById($id);
    }
	public function getAllTopics($forumName){
        return UserManagerDB::getAllTopics($forumName);
    }
	public function getTopicById($forumName,$id){
        return UserManagerDB::getTopicById($forumName,$id);
    }
	public function getAnswerById($answerName,$id){
        return UserManagerDB::getAnswerById($answerName,$id);
    }
	public function addReply($answerName, $id, $a_name, $a_email, $a_answer, $a_datetime){
        UserManagerDB::addReply($answerName, $id, $a_name, $a_email, $a_answer, $a_datetime);
    }
	public function getAllThreads($id){
        return UserManagerDB::getAllThreads($id);
    }
	public function getAllMessages($id, $userToId){
        return UserManagerDB::getAllMessages($id, $userToId);
    }
	public function addMessageReply($user_to, $user_from, $messageBody, $datetime, $subjectId){
        return UserManagerDB::addMessageReply($user_to, $user_from, $messageBody, $datetime, $subjectId);
    }
    public function getUserByName($name){
        return UserManagerDB::getUserByName($name);
    }
    public function addNewThread($user_to, $user_from, $subject, $datetime) {
        return UserManagerDB::addNewThread($user_to, $user_from, $subject, $datetime);
    }
    public function getThreadBySubject($subject){
        return UserManagerDB::getThreadBySubject($subject);
    }
    public function getUserTo($id){
        return UserManagerDB::getUserTo($id);
    }
    public function getRecipient($id, $sender){
        return UserManagerDB::getRecipient($id, $sender);
    }
	public function addNewTopic($topic, $detail, $name, $email, $datetime, $view, $reply){
        return UserManagerDB::addNewTopic($topic, $detail, $name, $email, $datetime, $view, $reply);
    }
}
?>