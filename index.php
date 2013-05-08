<html>
<body>
    <h3>twilio-tools</h3>

    <div style="padding:3px;">
        <a href="smsforward.php">smsforward.php</a>
        <div style="padding:10px;">
            Parameters:<br/>
            <i>PhoneNumber:</i> The phone number to forward messages to<br/>
            <i>Example</i>:<br/>
            <code><a href="http://twilio-tools.herokuapp.com/smsforward.php?PhoneNumber=4155551234">http://twilio-tools.herokuapp.com/smsforward.php?PhoneNumber=4155551234<a/></code>
        </div>
    </div>

    <div style="padding:3px;">
        <a href="smskeyword.php">smskeyword.php</a>
        <div style="padding:10px;">
            Parameters:<br/>
            <i>&lt;any keyword&gt;:</i> Keyword for an autoreply<br/>
            <i>default:</i> Default message to display if no keywords matched<br/>
            <i>Example</i>:<br/>
            <code><a href="http://twilio-tools.herokuapp.com/smskeyword.php?car=The car is green&boat=The boat is blue&default=Vehicle not found">http://twilio-tools.herokuapp.com/smskeyword.php?car=The car is green&boat=The boat is blue&default=Vehicle not found<a/></code>
        </div>
    </div>

    <div style="padding:3px;">
        <a href="smsforward.php">areacode_block.php</a>
        <div style="padding:10px;">
            Parameters:<br/>
            <i>blocked:</i> Comma separated list of area codes to reject<br/>
            <i>redirect:</i> Url to redirect to if the caller's area code isn't blocked<br/>
            <i>Example</i>:<br/>
            <code><a href="http://twilio-tools.herokuapp.com/areacode_block.php?From=+16043829141&block=604,778,250&redirect=http://demo.twilio.com/welcome/">http://twilio-tools.herokuapp.com/areacode_block.php?From=+16043829141&block=604,778,250&redirect=http://demo.twilio.com/welcome/<a/></code>
        </div>
    </div>

</body>
</html>
