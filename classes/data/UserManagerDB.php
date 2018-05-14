<?php
namespace classes\data;

use classes\entity\User;
use classes\entity\Job;
use classes\entity\Forum;
use classes\entity\Topic;
use classes\entity\Answer;
use classes\entity\Thread;
use classes\entity\Message;
use classes\util\DBUtil;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class UserManagerDB
{
    public static function fillUser($row){
        $user=new User();
        $user->id=$row["id"];
        $user->firstName=$row["firstname"];
        $user->lastName=$row["lastname"];
        $user->email=$row["email"];
        $user->password=$row["password"];
		$user->is_admin=$row["is_admin"];
		$user->is_block=$row["is_block"];
		$user->profile_pic=$row["profile_pic"];
		$user->profile=$row["profile"];
        return $user;
    }
	public static function fillJobs($row){
        $job=new Job();
        $job->jobId=$row["jobId"];
        $job->jobTitle=$row["jobTitle"];
        $job->jobDescription=$row["jobDescription"];
        $job->jobExpiry=$row["jobExpiry"];
        $job->jobRequirement=$row["jobRequirement"];
        return $job;
    }
	public static function fillForum($row){
        $forum=new Forum();
        $forum->forumId=$row["forumId"];
        $forum->forumName=$row["forumName"];
        $forum->forumLanguage=$row["forumLanguage"];
        $forum->forumAdminId=$row["forumAdminId"];
        return $forum;
    }
	public static function fillTopics($row){
        $topic=new Topic();
        $topic->topicId=$row["id"];
        $topic->topicTopic=$row["topic"];
        $topic->topicDetail=$row["detail"];
        $topic->topicCreator=$row["name"];
		$topic->topicCreatorEmail=$row["email"];
		$topic->topicDateTime=$row["datetime"];
		$topic->topicViews=$row["view"];
		$topic->topicReplies=$row["reply"];
        return $topic;
    }
	public static function fillAnswers($row){
        $answer=new Answer();
        $answer->answerId=$row["a_id"];
        $answer->answerTopicId=$row["question_id"];
        $answer->answerName=$row["a_name"];
        $answer->answerEmail=$row["a_email"];
		$answer->answerAnswer=$row["a_answer"];
		$answer->answerDateTime=$row["a_datetime"];
        return $answer;
    }
	public static function fillMessage($row){
        $message=new Message();
        $message->messageId=$row["messageId"];
        $message->userTo=$row["user_to"];
        $message->userFrom=$row["user_from"];
        $message->messageBody=$row["messageBody"];
		$message->messageDate=$row["messageDate"];
		$message->subjectId=$row["fk_subjectId"];
        return $message;
    }
	public static function fillThread($row){
        $thread=new Thread();
        $thread->subjectId=$row["subjectId"];
        $thread->userTo=$row["fk_user_to"];
        $thread->userFrom=$row["fk_user_from"];
        $thread->subject=$row["subject"];
		$thread->threadDate=$row["date"];
        return $thread;
    }
    public static function getUserByEmailPassword($email,$password){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $password=mysqli_real_escape_string($conn,$password);
        $sql="select * from tb_user where email='$email' and password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }
    public static function getUserByEmail($email){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $sql="select * from tb_user where Email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }
    public static function saveUser(User $user){
        $conn=DBUtil::getConnection();
        $sql="call procSaveUser(?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issss", $user->id,$user->firstName, $user->lastName, $user->email,$user->password); 
        $stmt->execute();
        if($stmt->errno!=0){
            printf("Error: %s.\n",$stmt->error);
        }
        $stmt->close();
        $conn->close();
    }
    public static function getAllUsers(){
        $users[]=array();
        $conn=DBUtil::getConnection();
        $sql="select * from tb_user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
                $users[]=$user;
            }
        }
        $conn->close();
        return $users;
    }
	public static function loginUser($email, $password){
        if(isset($_REQUEST["submitted"])){
		$email=$_REQUEST["email"];
		$password=$_REQUEST["password"];
		$existuser = self::getUserByEmailPassword($email,$password);
    
		if(isset($existuser)){
			session_start();
			$_SESSION['is_logged_in'] = true;
			$_SESSION['user'] = serialize($existuser);
			header("Location:home.php");
		}
		else{
			$passwordError="Invalid User Name or Password";
		}
		}
    }
	public static function registerUser($firstName,$lastName,$email,$password){
        if(isset($_REQUEST["submitted"])){
		$firstName=$_REQUEST["firstName"];
		$lastName=$_REQUEST["lastName"];
		$email=$_REQUEST["email"];
		$password=$_REQUEST["password"];
    
		if($firstName!='' && $lastName!='' && $email!='' && $password!=''){
			$user=new User();
			$user->firstName=$firstName;
			$user->lastName=$lastName;
			$user->email=$email;
			$user->password=$password;
			
			$existuser=self::getUserByEmail($email);
		
			if(!isset($existuser)){
				$UM = self::saveUser($user);
				header("Location:/phpcrudsample/public/modules/user/registerthankyou.php");
			}
			else{
				$formerror="User Already Exist";
			}
		}
		else
		{
			$formerror="Please fill in the fields";
		}
		
		if (($email != "") && (!filter_var($email, FILTER_VALIDATE_EMAIL)))
		{
			$emailError = "Invalid email format";	
		}
		}
	}
	public static function forgetPassword($remail,$rsent){
		$rsent = false;
		$remail = "";
		
        if (isset($_POST['submit'])){
		$email = $_POST['remail'];
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error[] = 'Please enter a valid email address';
		}

		// checks if the username is in use
		$check = mysql_query("SELECT email FROM tb_user WHERE email = '$email'")or die(mysql_error());
		$check2 = mysql_num_rows($check);

	//if the name exists it gives an error
	if ($check2 == 0){
		$error[] = 'Sorry, we cannot find your account details please try another email address.';
	} 
	else{
		$query = mysql_query("SELECT firstname FROM tb_user WHERE email = '$email' ")or die (mysql_error());
		$r = mysql_fetch_object($query);

		//create a new random password

		$password = substr(md5(uniqid(rand(),1)),3,10);

		//send email
		$mail = new PHPMailer;
		//Enable SMTP debugging.
		$mail->SMTPDebug = 0;
		//Set PHPMailer to use SMTP.
		$mail->isSMTP();
		//Set SMTP host name
		$mail->Host = "smtp.gmail.com";
		//Set this to true if SMTP host requires authentication
		$mail->SMTPAuth = true;
		//Provide username and password
		$mail->Username = "abclearnctr@gmail.com";
		$mail->Password = "RahmatYasin";
		//If SMTP requires TLS encryption then set it
		$mail->SMTPSecure = "tls";
		//Set TCP port to connect to
		$mail->Port = 587;
		$mail->From = "abclearnctr@gmail.com";
		$mail->FromName = "ABC Learning Centre Admin";
		$mail->addAddress("$email");
		$mail->isHTML(true);
		$mail->Subject = "Account Details Recovery";
		$mail->Body = "<p>Hi $r->firstname, you or someone else have requested your account details. Here is your account information please keep this as you may need this at a later stage. Your password is $password Your password has been reset please login and change your password to something more rememberable. Regards Site Admin</p				>";
		$mail->AltBody = "This is the plain text version of the email content";

		//update database
		$sql = mysql_query("UPDATE tb_user SET password='$password' WHERE email = '$email'")
		or die (mysql_error());
		$rsent = true;

		$mail->send();
		header("Location:/phpcrudsample/public/modules/user/forgetpasswordthankyou.php");
	}
// close errors
// close if form sent

//show any errors
		if(!empty($error)){
			$i = 0;
			while ($i < count($error)){
				echo "<div class='msg-error'>".$error[$i]."</div>";
				$i ++;
			}
		}
		// close if empty errors
		}
    }
	public static function updateProfile($firstName,$lastName,$email,$password){
		
		if(!isset($_REQUEST["submitted"])){
			$user = new User();
		  $firstName=$user->firstName;
		  $lastName=$user->lastName;
		  $email=$user->email;
		  $password=$user->password;	  
		}else{
		  $firstName=$_REQUEST["firstName"];
		  $lastName=$_REQUEST["lastName"];
		  $email=$_REQUEST["email"];
		  $password=$_REQUEST["password"];

	  if($firstName!='' && $lastName!='' && $email!='' && $password!=''){
		   $update=true;
		   /* if($email!=$_SESSION["email"]){
			   $existuser=$UM->getUserByEmail($email);
			   if(is_null($existuser)==false){
				   $formerror="User Email already in use, unable to update email";
				   $update=false;
			   }
		   } */
			 if($email!=$email){
			   $existuser=self::getUserByEmail($email);
			   if(is_null($existuser)==false){
				   $formerror="User Email already in use, unable to update email";
				   $update=false;
			   }
		   }
		   if($update){
			   $existuser=self::getUserByEmail($email);
			   $existuser->firstName=$firstName;
			   $existuser->lastName=$lastName;
			   $existuser->email=$email;
			   $existuser->password=$password;
			   //$UM->saveUser($existuser);
			   $UM = self::saveUser($existuser);
			   $_SESSION["email"]=$email;
			   header("Location:../../home.php");
		   }
	  }
		}
	}
	
	public static function searchUsers($query){ 
		$users[]=array();
		$conn=DBUtil::getConnection(); 
		$sql = "SELECT * FROM tb_user WHERE (`firstname` LIKE '%".$query."%') OR (`lastname` LIKE '%".$query."%') OR (`email` LIKE '%".$query."%') OR (`profile` LIKE '%".$query."%') OR (`profile_pic` LIKE '%".$query."%')";
		$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
					$user=self::fillUser($row);
					$users[]=$user;
				}
			$conn->close();
			return $users;
			}
	}
	
	public static function getUserById($id){
		$user=NULL;
		$conn=DBUtil::getConnection();
		$sql="select * from tb_user where id='$id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			if($row = $result->fetch_assoc()){
				$user=self::fillUser($row);
			}
		}
		$conn->close();
		return $user;
	}
	
	public static function getAllJobs(){
        $jobs[]=array();
        $conn=DBUtil::getConnection();
        $sql="select * from tb_jobs";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $job=self::fillJobs($row);
                $jobs[]=$job;
            }
        }
        $conn->close();
        return $jobs;
    }
	public static function getJobById($jobId){
        $job=NULL;
        $conn=DBUtil::getConnection();
        $sql="select * from tb_jobs where jobId='$jobId'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $job=self::fillJobs($row);
            }
        }
        $conn->close();
        return $job;
    }
	public static function searchJobs($query){ 
			$jobs[]=array();
			$conn=DBUtil::getConnection(); 
			$sql = "SELECT * FROM tb_jobs WHERE (jobTitle LIKE '%".$query."%')";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
					$job=self::fillJobs($row);
					$jobs[]=$job;
				}
			$conn->close();
			return $jobs;
			}
	}
	public static function saveApplication($user, $job){
        $conn=DBUtil::getConnection();
		//var_dump ($user);
		//var_dump ($job);
        $sql="call procSaveApplication(?,?,?)";
        $stmt = $conn->prepare($sql);
		$applyId = NULL;
		$status = 'processing';
		$userId = $user->id;
		$jobId = $job->jobId;
		//print $userId;
		//print $jobId;
        $stmt->bind_param("sii", $status, $jobId, $userId); 
        $stmt->execute();
        if($stmt->errno!=0){
            printf("Error: %s.\n",$stmt->error);
        }
        $stmt->close();
        $conn->close();
    }
	public static function getAllForum(){
        $forums[]=array();
        $conn=DBUtil::getConnection();
        $sql="select * from tb_forum";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $forum=self::fillForum($row);
                $forums[]=$forum;
            }
        }
        $conn->close();
        return $forums;
    }
	public static function getForumById($id){
		$forum=NULL;
		$conn=DBUtil::getConnection();
		$sql="select * from tb_forum where forumId='$id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			if($row = $result->fetch_assoc()){
				$forum=self::fillForum($row);
			}
		}
		$conn->close();
		return $forum;
	}
	public static function getAllTopics($forumName){
        $topics[]=array();
        $conn=DBUtil::getConnection();
        $sql= "select * from `$forumName`";
        $result = $conn->query($sql);
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $topic=self::fillTopics($row);
                $topics[]=$topic;
            }
        }
        $conn->close();
        return $topics;
    }
	public static function getTopicById($forumName,$id){
			$topic=NULL;
			$conn=DBUtil::getConnection();
			$sql="SELECT * FROM `$forumName` WHERE id='$id'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				if($row = $result->fetch_assoc()){
					$topic=self::fillTopics($row);
				}
			}
			$conn->close();
			return $topic;
    }
	public static function getAnswerById($answerName,$id){
        $answers[]=array();
        $conn=DBUtil::getConnection();
        $sql= "select * from `$answerName` WHERE question_id='$id'";
        $result = $conn->query($sql);
         if ($result->num_rows > 0) {	
            while($row = $result->fetch_assoc()){
                $answer=self::fillAnswers($row);
                $answers[]=$answer;
            }
        }
        $conn->close();
        return $answers;
    }
	public static function addReply($answerName, $id, $a_name, $a_email, $a_answer, $a_datetime){
        $conn=DBUtil::getConnection(); 
		$sql="SELECT MAX(a_id) FROM $answerName WHERE question_id='$id'";
		$result= $conn->query($sql);
        if ($result !== false) {		
			$Max_id = $result+1;
		}
		else {
			$Max_id = 1;
		}
		$sql="call addReply(?,?,?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("issssi", $Max_id, $a_name, $a_email, $a_answer, $a_datetime, $id); 
		$result2=$stmt->execute();
		
		if($result2){
		 
		// If added new answer, add value +1 in reply column
		$sql="call updateReply(?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ii", $Max_id, $id); 
		$stmt->execute();
		}
		else {
		echo "ERROR";
		}
		mysql_close();
	}
	public static function getAllThreads($id){
        $threads[]=array();
        $conn=DBUtil::getConnection();
        $sql= "select * from thread where fk_user_to='$id' or fk_user_from='$id'";
        $result = $conn->query($sql);
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $thread=self::fillThread($row);
                $threads[]=$thread;
            }
        }
        $conn->close();
        return $threads;
    }
	public static function getAllMessages($id, $userToId){
        $messages[]=array();
        $conn=DBUtil::getConnection();
        $sql= "SELECT * FROM `messages` WHERE `fk_subjectId` ='$id' AND (`user_from` = '$userToId' OR `user_to` ='$userToId')";
        $result = $conn->query($sql);
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $message=self::fillMessage($row);
                $messages[]=$message;
            }
        }
        $conn->close();
        return $messages;
    }
	public static function addMessageReply($user_to, $user_from, $messageBody, $datetime, $subjectId) {
        $conn=DBUtil::getConnection(); 
		$sql="call addMessageReply(?,?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("iissi", $user_to, $user_from, $messageBody, $datetime, $subjectId); 
		$result=$stmt->execute();
		$conn->close();
	}
    public static function getUserByName($name){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$name);
        $sql="select * from tb_user where firstname='$name'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }
	public static function addNewThread($user_to, $user_from, $subject, $datetime) {
        $conn=DBUtil::getConnection(); 
		$sql="call addNewThread(?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("iiss", $user_to, $user_from, $subject, $datetime); 
		$result=$stmt->execute();
		$conn->close();
	}
	
    public static function getThreadBySubject($subject){
        $thread=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$subject);
        $sql="select * from thread where subject='$subject'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $thread=self::fillThread($row);
            }
        }
        $conn->close();
        return $thread;
    }
    public static function getUserTo($id){
        $thread=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$id);
        $sql="select * from thread where subjectId='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $thread=self::fillThread($row);
            }
        }
        $conn->close();
        return $thread->userFrom;
    }
	public static function getRecipient($id, $sender){
        $thread=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$id);
        $sql="select * from thread where subjectId='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $thread=self::fillThread($row);
            }
        }
		if ($sender == $thread->userTo) {
			$recipient = $thread->userFrom;
		} else {
			$recipient = $thread->userTo;
		}
        $conn->close();
        return $recipient;
    }
	public static function addNewTopic($topic, $detail, $name, $email, $datetime) {
		$view = 0;
		$reply = 1;
        $conn=DBUtil::getConnection(); 
		$sql="call addNewTopic(?,?,?,?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sssssii", $topic, $detail, $name, $email, $datetime, $view, $reply); 
		$result=$stmt->execute();
		$conn->close();
	}
}
?>