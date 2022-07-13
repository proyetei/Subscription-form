<?php
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $website = htmlspecialchars($_POST['website']);
  $message = htmlspecialchars($_POST['message']);
  if(!empty($email) && !empty($message)){ //if email field and message field is not empty
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //validates email address
      $receiver = "receiver_email_address"; //enter that email address where you want to receive all messages
      $subject = "From: $name <$email>";
      $body = "Name: $name\nEmail: 
      $email\nPhone: $phone\nWebsite: 
      $website\n\nMessage:\n
      $message\n\nRegards,\n$name";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){
         echo "Your message has been sent!";
      }else{
         echo "Sorry, failed to send your message!";
      }
    }else{ //if email address is not validated by filter_validate_email
      echo "Enter a valid email address!";
    }
  }else{ //if user does not input a message
    echo "Email and message field is required!";
  }
?>