<?php
if (!isset($_REQUEST['account_sid'])){ ?>
	<html lang="en">
		<head>
			<title>Twilio Call Log Exporter</title>
		</head>
		<body>
			<div>
				<h1>Twilio Call Log Exporter</h1>
				<form method="POST">
					<p>
						<label for="account_sid">Account SID</label>
						<input id="account_sid" type="text" name="account_sid" maxlength="34" required>
					</p>

					<p>
						<label for="auth_token">Auth Token</label>
						<input id="auth_token" type="text" name="auth_token" maxlength="32" required>
					</p>
					<p>
						<label for="start_date">Start Date</label>
						<input id="start_date" type="date" name="start_date"  required>
					</p>

					<p>
						<label for="end_date">End Date</label>
						<input id="end_date" type="date" name="end_date" required>
					</p>

					<p>
						<input type="submit" name="submit" value="Export log">
					</p>
				</form>
			</div>
		</body>
	</html>
<?php } else {
	require('Services/Twilio.php');
	$account_sid = $_REQUEST['account_sid'];
	$auth_token = $_REQUEST['auth_token'];
	$subaccount_sid = $_REQUEST['account_sid'];
	$client = new Services_Twilio($account_sid, $auth_token);
	$subaccount = $client->accounts->get($subaccount_sid);

	$start = date('Y-m-d', strtotime($_REQUEST['start_date']));
	$stop = date('Y-m-d', strtotime($_REQUEST['end_date'] . ' + 1 day'));
	// Download data from Twilio API
	$calls = $subaccount->calls->getIterator(0, 1000, array(
	    'StartTime>' => $start,
	    'StartTime<' => $stop,
	    //'Status' => 'busy', // **Optional** filter by Status...
	    //'From' => '+17075551234', // ...by 'From'...
	    //'To' => '+18085559876', // ...or by 'To'.
	));

	$filename = $subaccount_sid."_calls.csv";
	header("Content-Type: application/csv") ;
	header("Content-Disposition: attachment; filename={$filename}");

	// Write headers
	$fields = array(
	    'Call SID', 'From', 'To', 'Start Time', 'End Time',
	    'Status', 'Direction', 'Price', 'Seconds', 'Minutes'
	);
	echo '"'.implode('","', $fields).'"'."\n";

	// Write rows
	foreach ($calls as $call) {
	    $row = array(
	        $call->sid, $call->from, $call->to, $call->start_time, $call->end_time,
	        $call->status, $call->direction, $call->price, $call->duration, ceil($call->duration/60),
	    );
	    echo '"'.implode('","', $row).'"'."\n";
			set_time_limit(0);
	}	
}
?>