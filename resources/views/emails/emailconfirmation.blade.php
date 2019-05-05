
@include('emails.email_header')

 <table border="0" cellspacing="0" cellpadding="0">
                    

                     <tr>
                        <td style="text-align: left;color:#2c2c2c; font-size: 25px;font-weight: bold;">Hello {{$name}},</td>
                    </tr> 
                    <tr>
                        <td style="text-align: left;color:#616161; font-size: 14px;padding:27px 0 30px;line-height: 26px;">Thanks You have successfully registered on Prymespace with {{$email}},You can login with your credential </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;color:#616161; font-size: 14px;line-height: 26px;text-align: center;padding: 17px 0 12px;">Stay connected with us!</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;color:#616161; font-size: 14px;line-height: 26px;text-align: center;">We wish you a great experience!</td>
                    </tr>
                    <tr>
                        <td style="color:#616161; font-size: 14px;padding: 39px 0 11px;">Cheers,</td>
                    </tr>
                    <tr>
                        <td style="color:#616161; font-size: 14px;">Prymespace  Team!</td>
                    </tr>
                   
                </table>

@include('emails.email_footer')