<?php require_once './template/header.php'; ?>

<!-- Portfolio Grid -->
<section class="bg-light" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center"><br>
                <h2 class="section-heading text-uppercase">Training History</h2><br>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <table id="tdatable" class="display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Session ID</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Type</th>
                            <th>Update Session</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Session ID</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Type</th>
                            <th>Update Session</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `tsessions` WHERE `createdby`=" . $_SESSION['uniqueID'];
                        $result = $db->query($sql);
                        $numRows = $db->numRows($result);
                        ?>
                        <?php if ($numRows > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <td><?php echo $row['idtable1']; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['tdate']; ?></td>
                                    <td><?php echo date('h:m A', strtotime($row['time'])); ?></td>
                                    <td><?php echo $row['sessionfor']; ?></td>
                                    <td>
                                        <?php if($row['createdby']==$_SESSION['uniqueID']): ?>
                                        <?php endif; ?>
                                        <a class="portfolio-link" data-toggle="modal" style="color: #b20000;"onclick="loadModelUpdateTrainer(<?php echo $row['idtable1']; ?>);" href="#portfolioModal1">Update</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                        <h3>No History Available</h3>
                    <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Modals -->

<!-- Modal 1 -->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class=" modal-body">
                            <div id="content">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once './template/footer.php';
