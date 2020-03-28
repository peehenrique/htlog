<div id="postList">
    <?php if(!empty($produtos)){ foreach($produtos as $post){ ?>
        <div class="list-item">
            <h2><?php echo $post['nome_produto']; ?></h2>
            <p><?php echo $post['meta_link']; ?></p>
            <p><?php echo $post['foto']; ?></p>
        </div>
    <?php } ?>
    <?php if($postNum > $postLimit){ ?>
        <div class="load-more" lastID="<?php echo $post['id']; ?>" style="display: none;">
            <img src="https://i.pinimg.com/originals/3f/2c/97/3f2c979b214d06e9caab8ba8326864f3.gif"/> Carregando mais produtos...
        </div>
    <?php }else{ ?>
        <div class="load-more" lastID="0">
            That's All!
        </div>
    <?php } ?>
<?php }else{ ?>
    <div class="load-more" lastID="0">
            That's All!
    </div>
<?php } ?>
