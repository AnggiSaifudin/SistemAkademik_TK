<table class="table table-bordered table-striped table-responsive">
    <thead class=" bg-blue">
        <tr>
            <th rowspan="2" class="text-center">No</th>
            <th rowspan="2" class="text-center">Kode</th>
            <th rowspan="2" class="text-center">Mapel</th>
            <th colspan="18" class="text-center">pertemuan</th>
            <th rowspan="2">%</th>
        </tr>
        <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
            <th>11</th>
            <th>12</th>
            <th>13</th>
            <th>14</th>
            <th>15</th>
            <th>16</th>
            <th>17</th>
            <th>18</th>
        </tr>
    </thead>
    <tbody>

        <?php $no = 1;
        foreach ($data_ap as $key => $value) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $value['kode_mapel']; ?></td>
                <td><?= $value['mapel']; ?></td>
                <td>
                    <?php if ($value['p1'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($value['p2'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($value['p3'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($value['p4'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($value['p5'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($value['p6'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($value['p7'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($value['p8'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($value['p9'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($value['p10'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($value['p11'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($value['p12'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($value['p13'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($value['p14'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($value['p15'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($value['p16'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($value['p17'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($value['p18'] == 0) { ?>
                        <i class="fa fa-times text-danger"></i>
                    <?php } elseif ($value['p1'] == 1) { ?>
                        <i class="fa fa-info text-black"></i>
                    <?php } elseif ($value['p1'] == 2) { ?>
                        <i class="fa fa-check text-success"></i>
                    <?php } ?>
                </td>

                <td>
                    <?php
                    $absen = ($value['p1'] +
                        $value['p2'] +
                        $value['p3'] +
                        $value['p4'] +
                        $value['p5'] +
                        $value['p6'] +
                        $value['p7'] +
                        $value['p8'] +
                        $value['p9'] +
                        $value['p10'] +
                        $value['p11'] +
                        $value['p12'] +
                        $value['p13'] +
                        $value['p14'] +
                        $value['p15'] +
                        $value['p16'] +
                        $value['p17'] +
                        $value['p18']) / 36 * 100;
                    echo number_format($absen, 0), '%';
                    ?>

                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>