<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

    <table align="center" border="0" cellpadding="0" cellspacing="0" style="border: 5px solid orangered; border-collapse: collapse; width: 100%; max-width: 550px;" class="content">
<!--         <tr>
            <td style="padding: 15px 10px 15px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center" style="color: #fff; font-family: Arial, sans-serif; font-size: 12px;">
                            Email not displaying correctly?  <a href="#" style="color: #0073AA;">View it in your browser</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr> -->
        <tr>
            <td align="center" bgcolor="green" style="padding: 10px 10px 10px 10px; color: #ffffff; font-family: Arial, sans-serif; font-size: 36px; font-weight: bold;">
                <img src="http://www.dleg.net/logos/auto.png" alt="le logo" width="250" height="110" style="display:block;">
            </td>
        </tr>
        <tr>
            <td align="justify" bgcolor="#ffffff" style="padding: 20px 20px 20px 20px; color: #555555; font-family: Arial, sans-serif; font-size: 15px; line-height: 30px; border-bottom: 1px solid #f6f6f6;">
                <b>Cher(e) <b><u><?= $this->name ?> <?= $this->lastname ?></u></b>, un accès et un espace de connexion vient de vous être dédié sur plateforme web de gestion du parc automobile en tant que 
                <?= $this->typeadministrateur->name ?> ! Cet espace vous permettra d'avoir accès aux fonctionnalités de cette application !<br><br> Les informations de connexion communiquées ci-dessous vous sont individuelles et vous incomberont de tout acte ou action ménée sur ladite plateforme à partir d'une session ouverte par celles-ci! <br><br> Vous ne devez donc, en aucun cas, les divulguées à une autre personne !</b>
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#f9f9f9" style="padding: 10px 10px 0 10px; color: #555555; font-family: Arial, sans-serif; font-size: 15px; line-height: 30px;">
                <b>login de connexion:</b> <?= $this->login ?>;
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#f9f9f9" style="padding: 10px 10px 0 10px; color: #555555; font-family: Arial, sans-serif; font-size: 15px; line-height: 30px;">
                    <b>Mot de passe:</b> <?= $pass ?>
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#f9f9f9" style="padding: 10px 10px 0 10px; color: #555555; font-family: Arial, sans-serif; font-size: 15px; line-height: 30px;">
                    <b>Adresse de la plateforme:</b> <a href="http://gpa.artci.lan">http://gpa.artci.lan</a>
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#f9f9f9" style="padding: 30px 20px 30px 20px; font-family: Arial, sans-serif; border-bottom: 1px solid #f6f6f6;">
                <table bgcolor="orangered" border="0" cellspacing="0" cellpadding="0" class="buttonwrapper">
                    <tr>
                        <td align="center" height="50" style=" padding: 0 25px 0 25px; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;" class="button">
                            <a href="http://gpa.artci.lan" style="color: #ffffff; text-align: center; text-decoration: none;">Aller à mon espace de connexion</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#ffffff" style="padding: 10px 20px 10px 20px; color: #555555; font-family: Arial, sans-serif; font-size: 13px; line-height: 24px; font-style: italic;">
               Vous serez emmener à changer ces informations lors de votre premiere connexion !
           </td>
       </tr>
       <tr>
             <td align="center" bgcolor="#dddddd" style="padding: 15px 10px 15px 10px; color: #555555; font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;">
            <b>Gestion du Parc Automobile.</b><br>Abidjan Côte d'Ivoire. &bull; 01 79 30 00 Tel: +225 56 49 17 13
        </td>
    </tr>
<!--     <tr>
        <td style="padding: 15px 10px 15px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="center" width="100%" style="color: #fff; font-family: Arial, sans-serif; font-size: 12px;">
                        2017-18 &copy; <a href="http://html.codedthemes.com/mash-able/" style="color: #0073AA;">Mash Able</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr> -->
</table>

</body>
</html>