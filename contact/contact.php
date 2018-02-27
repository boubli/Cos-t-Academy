<?php
/* Set e-mail recipient */
$myemail  = "bbb.vloger@gmail.com";

/* Check all form inputs using check_input function */
$name = check_input($_POST['name'], "Enter your name");
$subject  = check_input($_POST['subject'], "Write a subject");
$email    = check_input($_POST['email']);
$phones  = check_input($_POST['phones']);
$likeit   = check_input($_POST['likeit']);
$how_find = check_input($_POST['how']);
$comments = check_input($_POST['comments'], "Write your comments");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/* If URL is not valid set $website to empty */
if (!preg_match("/^(https?:\/\/+[\w\-]+\.[\w\-]+)/i", $website))
{
    $website = '';
}

/* Let's prepare the message for the e-mail */
$message = "Hello !! Adam Dihaj

الإسم الكامل: $name
البريد الإكتروني: $email
رقم الهاتف: $phones

هل أعجبك الموقع $likeit
في أي صنف ستجتاز الإمتحان $how_find

الرساللة :
$comments

فريق عمل كوست اكاديمي
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: thanks.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>المرجو تصحيح الخطأ:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>