
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Vehicle Service Requests Report</h5>
    </div>
    <div class="card-body">
            <table class="table table-bordered">
                <colgroup>
                    <col width="5%">
                    <col width="15%">
                    <col width="15%">
                    <col width="15%">
                    <col width="15%">
                    <col width="10%">
                    <col width="10%">
                </colgroup>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date Time</th>
                        <th>Owner Name</th>
                        <th>Owner Contact</th>
                        <th>Vehicle Name</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                        $where = "where status = '0'";

                        $qry = $conn->query("SELECT * from service_requests {$where} order by id desc");
                        while($row = $qry->fetch_assoc()):
                        $meta = $conn->query("SELECT * FROM request_meta where request_id = '{$row['id']}'");

                        while($mrow = $meta->fetch_assoc()){
                            $row[$mrow['meta_field']] =$mrow['meta_value'];
                        }
                        
                        $services  = $conn->query("SELECT * FROM service_list where id in ({$row['service_id']}) ");

                        while($srow = $services->fetch_assoc()):
                            
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i++ ?></td>
                        <td><?php echo $row['date_created'] ?></td>
                        <td><?php echo $row['owner_name'] ?></td>
                        <td><?php echo $row['contact'] ?></td>
                        <td><?php echo $row['vehicle_name'] ?></td>
                        <td><?php echo $srow['service'] ?></td>
                        <td class='text-center'>
                            <?php if($row['status'] == 1): ?>
                                <span class="badge badge-primary">Confirmed</span>
                            <?php elseif($row['status'] == 2): ?>
                                <span class="badge badge-warning">On-progress</span>
                            <?php elseif($row['status'] == 3): ?>
                                <span class="badge badge-success">Done</span>
                            <?php elseif($row['status'] == 4): ?>
                                <span class="badge badge-danger">Cancelled</span>
                            <?php else: ?>
                                <span class="badge badge-secondary">Pending</span>
                            <?php endif; ?>
                        </td>
                        <td> <a class="btn btn-primary" href="?page=payment/pay_service&id=<?php echo $row['id']?>"><span class="fa fa-edit text-primary"></span> Charge</a></td>
                    </tr>
                    <?php endwhile; ?>
                    <?php endwhile; ?>
                    <?php if($qry->num_rows <= 0): ?>
                    <tr>
                        <td class="text-center" colspan="6">No Data...</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
    </div>
</div>
<noscript>
    <style>
        .m-0{
            margin:0;
        }
        .text-center{
            text-align:center;
        }
        .text-right{
            text-align:right;
        }
        .table{
            border-collapse:collapse;
            width: 100%
        }
        .table tr,.table td,.table th{
            border:1px solid gray;
        }
    </style>
</noscript>

<script>
    $(function(){
        $('#filter-form').submit(function(e){
            e.preventDefault()
            location.href = "./?page=report&date_start="+$('[name="date_start"]').val()+"&date_end="+$('[name="date_end"]').val()
        })

        $('#printBTN').click(function(){
            var rep = $('#printable').clone();
            var ns = $('noscript').clone().html();
            start_loader()
            rep.prepend(ns)
            var nw = window.document.open('','_blank','width=900,height=600')
                nw.document.write(rep.html())
                nw.document.close()
                nw.print()
                setTimeout(function(){
                    nw.close()
                    end_loader()
                },500)
        })
    })
</script>