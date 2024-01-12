<?php
echo '<h5 class="card-title" style="font-weight: bold">'.$job['job_title'].'</h5>';
echo '<h6 class="card-subtitle mb-2 text-body-secondary">'.$job['company'].'</h6>';
echo '<p class="card-text">
        <ul>
            <li>'.$job['job_highlight1'].'</li>
            <li>'.$job['job_highlight2'].'</li>
            <li>'.$job['job_highlight3'].'</li>
        </ul>
      </p>';
echo '<p class="card-text" style="font-size: 0.8rem">Post time: '.$job['post_datetime'].'</p>';
if(!empty($job['edit_datetime'])){
    echo '<p class="card-text" style="font-size: 0.8rem">Last Update: '.$job['edit_datetime'].'</p>';
}
?>