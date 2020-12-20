<?php

$connect = new PDO("mysql:host=localhost; dbname=id15615877_dblavan", "id15615877_lavank", "User#9512log");
/*function get_total_row($connect)
{
  $query = "
  SELECT * FROM tbl_webslesson_post
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  return $statement->rowCount();
}

$total_record = get_total_row($connect);*/

$limit = '4';
$page = 1;
if ($_POST['page'] > 1) {
    $start = (($_POST['page'] - 1) * $limit);
    $page = $_POST['page'];
} else {
    $start = 0;
}

$query = "
SELECT * FROM events 
";

if ($_POST['query'] != '') {
    $query .= '
  WHERE title LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%" OR payment LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%" OR short_des LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%"
  OR location LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%" OR industries LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%" OR sector LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%"
  OR reglink LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%" OR brief_des LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%" OR eventdate LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%"
  OR eventtime LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%"
  ';
}

$query .= 'ORDER BY id ASC ';

$filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '';
if ($total_data > 0) {
    foreach ($result as $row) {
        $dated = $row['eventdate'];
        $timed = $row['eventtime'];
        $d1 = date("l", strtotime($dated));
        $dated = date("d F, y", strtotime($dated));
        $timed = date("h:i A", strtotime($timed));

        $output .= '
                <div class="card mb-3 hoverable1">
                    <div class="row no-gutters">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <img src="./controllers/uploaded_files/' . $row['image'] . '" class="card-img" alt="">
                            </div>
                        <div class="col-sm-9 col-md-9 col-lg-9">
                            <div class="card-body">
                            <div class=row>
                            <div class="col-sm-8 col-md-8 col-lg-8">
                                <p class="p3"><b> ' . $row['title'] . '</b></p>
                                <p class="p4"> ' . $row['short_des'] . ' </p>
                                <p class="p5"> ' . $row['industries'] . ' - ' . $row['sector'] . ' </p>
                                <p class="card-text p6">
                                    <div class="text-muted small">
                                    <img src="https://img.icons8.com/color/96/000000/calendar.png"/> ' . $dated . '&nbsp;&nbsp;&nbsp;&nbsp; 
                                    <img src="https://img.icons8.com/material-outlined/24/000000/clock.png"/> ' . $d1 . ',  ' . $timed . ' 
                                    </div>
                                </p>
                                
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="lake">
                                        <a href="editevent.php?id=' . $row['id'] . '">
                                        <span class="btn btn-md btn-primary btn-edit"><img src="./assets/edit.png" /> Edit </span>
                                        </a>
                                        <a href="./controllers/deleteevent.php?id=' . $row['id'] . '">
                                        <span class="btn btn-md btn-primary btn-edit"><img src="./assets/edit.png" /> Delete </span>
                                        </a>
                                        <p class="p7"><img src="./assets/location.jpg" /> ' . $row['location'] . ' </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    ';
    }
} else {
    $output .= '
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';
}

$output .= '
<label>' . $total_data . ' - Events</label>
<br />
<div align="center">
  <ul class="pagination">
';

$total_links = ceil($total_data / $limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if ($total_links > 4) {
    if ($page < 5) {
        for ($count = 1; $count <= 5; $count++) {
            $page_array[] = $count;
        }
        $page_array[] = '...';
        $page_array[] = $total_links;
    } else {
        $end_limit = $total_links - 5;
        if ($page > $end_limit) {
            $page_array[] = 1;
            $page_array[] = '...';
            for ($count = $end_limit; $count <= $total_links; $count++) {
                $page_array[] = $count;
            }
        } else {
            $page_array[] = 1;
            $page_array[] = '...';
            for ($count = $page - 1; $count <= $page + 1; $count++) {
                $page_array[] = $count;
            }
            $page_array[] = '...';
            $page_array[] = $total_links;
        }
    }
} else {
    for ($count = 1; $count <= $total_links; $count++) {
        $page_array[] = $count;
    }
}

for ($count = 0; $count < count($page_array); $count++) {
    if ($page == $page_array[$count]) {
        $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
    </li>
    ';

        $previous_id = $page_array[$count] - 1;
        if ($previous_id > 0) {
            $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">Previous</a></li>';
        } else {
            $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
        }
        $next_id = $page_array[$count] + 1;
        if ($next_id >= $total_links) {
            $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
        } else {
            $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">Next</a></li>';
        }
    } else {
        if ($page_array[$count] == '...') {
            $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
        } else {
            $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
      ';
        }
    }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';

echo $output;
