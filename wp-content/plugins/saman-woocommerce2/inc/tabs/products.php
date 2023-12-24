<style type="text/css">

    .ham-container-products.hampro {
        display: grid;
        grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
        grid-gap: 10px;
        margin-top: 10px;
    }
    .ham-container-products.hampro .ham-product {
        background: #fff;
        padding: 10px;
        border: 1px solid #e6e6e6;
        margin: 0;
        width: auto;
    }
    .ham-container-products.hampro .ham-product a {
        display: block;
        text-decoration: none;
    }
    .ham-container-products.hampro .ham-product .ham-product-cover img {
        width: 100%;
        height: auto;
        display: block;
    }
    .ham-container-products.hampro .ham-product .ham-product-title {
        font-size: 1rem;
    }
    .hampro *{
        box-sizing: border-box;
    }

</style>
<?php
$response = wp_remote_get('https://ads.daryaye-sokhan.ir/wp-products.php', array(
    'timeout' => 30,
    'headers' => array(
        'Accept: application/json'
    )
        )
);
$results = null;
if (!is_wp_error($response))
{
    $responseBody = wp_remote_retrieve_body($response);
    $results = json_decode($responseBody);
}

if ($results)
{
    ?>
    <div class="ham-container ham-container-products hampro">
        <div class="ham-product ham-product-placeholder wp-clearfix" style="display: none;">
            <a class="ham-product-url" href="" rel="" nofollow"="" target="_blank">
                <div class="ham-product-cover"></div>
                <h3 class="ham-product-title"></h3>
                <div class="ham-product-price"><span></span>
                </div>
            </a>
        </div>
        <?php
        foreach ($results as $item)
        {
            ?>
            <div class="ham-product wp-clearfix" style="">
                <a class="ham-product-url" href="<?= esc_url($item->link) ?>" nofollow="nofollow" target="_blank">
                    <div class="ham-product-cover">
                        <img src="<?= esc_url($item->image) ?>">
                    </div>
                    <h3 class="ham-product-title"><?= $item->title ?></h3>
                    <div class="ham-product-price"></div>
                </a>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
?>