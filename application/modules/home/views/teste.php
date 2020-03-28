<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>

    <div id="postList">
        <?php if(!empty($produtos)){ foreach($produtos as $post){ ?>
            <div class="list-item">
                <h2><?php echo $post['nome_produto']; ?></h2>
                <p><?php echo $post['meta_link']; ?></p>
                <p><?php echo $post['foto']; ?></p>
            </div>
        <?php } ?>
            <div class="load-more" lastID="<?php echo $post['id']; ?>" style="display: none;">
                <img src="https://i.pinimg.com/originals/3f/2c/97/3f2c979b214d06e9caab8ba8326864f3.gif"/> Carregando mais produtos...
            </div>
        <?php }else{ ?>
            <p>Post(s) not available.</p>
        <?php } ?>
    </div>


    <script type="text/javascript">
    $(document).ready(function(){
        $(window).scroll(function(){
            var lastID = $('.load-more').attr('lastID');
            if(($(window).scrollTop() == $(document).height() - $(window).height()) && (lastID != 0)){
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url('home/loadMoreData'); ?>',
                    data:'id='+lastID,
                    beforeSend:function(){
                        $('.load-more').show();
                    },
                    success:function(html){
                        $('.load-more').remove();
                        $('#postList').append(html);
                    }
                });
            }
        });
    });
    </script>


  </body>
</html>
