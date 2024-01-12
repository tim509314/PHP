<?php
if($dbConnection->error) {echo "Error updating record: " . $dbConnection->error;}
$dbConnection->close();
?>
</body>
</html>