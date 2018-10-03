<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style-modal.css">
	<title>Document</title>
</head>
<body>


<form class="contact_form" action="#" method="post" name="contact_form">
    <ul>
        <li>
             <h2>Contact Us</h2>
             <span class="required_notification">* Denotes Required Field</span>
        </li>
        <li>
            <label for="name">Name:</label>
            <input type="text"  placeholder="John Doe" required />
        </li>
        <li>
            <label for="email">Email:</label>
            <input type="tel" name="email" placeholder="john_doe@example.com" pattern="8[0-9]{3}[0-9]{3}[0-9]{4}" required />
            <span class="form_hint">Proper format "name@something.com"</span>
        </li>
        <li>
            <label for="website">Website:</label>
            <input type="url" name="website" placeholder="http://johndoe.com" required pattern="(http|https)://.+"/>
            <span class="form_hint">Proper format "http://someaddress.com"</span>
        </li>
        <li>
            <label for="message">Message:</label>
            <textarea name="message" cols="40" rows="6" required ></textarea>
        </li>
        <li>
        	<button class="submit" type="submit">Submit Form</button>
        </li>
    </ul>
</form>

<!--
Как уже говорилось, валидация HTML5 основана на атрибутах type и включена по умолчанию. Для активации валидации формы никакой особенной разметки не требуется. Если хотите ее выключить, можете употребить атрибут novalidate, как здесь:

view sourceprint?
1.
<form novalidate>
2.
-- do not validate this form --
3.
<input type="text" />
4.
</form> -->


</body>
</html>