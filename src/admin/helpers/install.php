<?php
    require_once 'helpers/load.php';
    $modules = get_all_modules();
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1">

        <title>Installation | Google Build</title>
        <meta name="author" content="Thomas Beumer">
        <meta name="description" content="Install Google Build">

        <link rel='stylesheet' href='assets/css/installation.css'/>
    </head>
    <body>
        <header>
            <h1>Google Build installation</h1>
            <p>Configure default Google Build settings</p>
        </header>
        <main>
            <form>
                <div class="topic">
                    <h4>Database settings</h4>
                    <input type="text" name="host" placeholder="Database host.." />
                    <input type="text" name="name" placeholder="Database name.." />
                    <input type="text" name="host" placeholder="Database user.." />
                    <input type="text" name="host" placeholder="Database password.." />
                </div>
                <div class="topic">
                    <h4>Create superadmin account</h4>
                    <input type="text" name="firstname" placeholder="Firstname.." />
                    <input type="text" name="lastname" placeholder="Lastname.." />
                    <input type="text" name="mail" placeholder="Email.." />
                    <input type="password" name="password" placeholder="Password.." />
                    <input type="password" name="confirm_password" placeholder="Confirm password.." />
                </div>
                <div class="topic">
                    <h4>Company details</h4>
                    <input type="text" name="company_name" placeholder="Company name.." />
                    <input type="text" name="company_tagline" placeholder="Company tagline.." />
                    <input type="text" name="company_street" placeholder="Company street.." />
                    <input type="text" name="company_street_nr" placeholder="Company street NR.." />
                    <input type="text" name="company_city" placeholder="Company city" />
                    <input type="text" name="company_postcode" placeholder="Company postcode.." />
                    <input type="text" name="company_state" placeholder="Company state/province" />
                    <input type="text" name="company_country" placeholder="Company country" />
                    <input type="text" name="company_phone" placeholder="Company phone.." />
                    <input type="text" name="company_phone_format" placeholder="Company phone tel format.." />
                    <input type="text" name="company_mail" placeholder="Company mail.." />
                </div>
                <div class="topic">
                    <h4>Detected modules</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Module name</th>
                                <th>Module version</th>
                                <th>Module author</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($modules as $key => $value) : ?>
                                <tr>
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['version']; ?></td>
                                    <td><?php echo $value['author']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </main>
    </body>
</html>