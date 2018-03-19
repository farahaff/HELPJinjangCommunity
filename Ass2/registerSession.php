<?php require_once './template/header.php'; ?>
<?php
$sql = "SELECT * FROM `tsessions` WHERE `status`=1 ";
$result = $db->query($sql);
$numRows = $db->numRows($result);
?>
<script>
    $('#portfolioModal1').on('show.bs.modal', function () {
        alert("before model load");
    })
</script>
<!-- Portfolio Grid -->
<section class="bg-light" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Available Training Sessions</h2><br>
            </div>
        </div>
        <?php if ($numRows > 0): ?>
            <!--- display all teh  available training sessions !-->
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <?php
                    $sql2 = "SELECT * FROM `ctype` WHERE `idctype`=" . $row['ctype'] . " LIMIT 1";
                    $result2 = $db->query($sql2);
                    //get the session type mma,sport,dance
                    $rowctype = mysqli_fetch_assoc($result2);
                    ?>
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" onclick="loadModel(<?php echo $row['idtable1']; ?>);" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fa fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="img/portfolio/<?php echo $rowctype['img']; ?>.jpg" alt="<?php echo $rowctype['img']; ?>">
                        </a>
                        <div class="portfolio-caption">
                            <h4><?php echo strtoupper($row['title']); ?></h4>
                            <p class="text-muted"><?php echo strtoupper($row['sessionfor']); ?>
                                <!-- should not show if personal !-->
                                <?php if ($row['sessionfor'] == 'group'): ?>
                                    (<?php echo $rowctype['name']; ?>)
                                <?php endif; ?>
                            </p>
                            <p class="text-muted"><?php echo "S" . $row['idtable1']; ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>

            <?php else: ?>
                <p></p>
                <h4 class="section-heading text-uppercase">no Training session available</h4><br>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Portfolio Modals -->

<!-- Modal 1 -->
<div class="portfolio-modal modal fade" id="portfolioModal1" php="loadphp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container" >
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
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
