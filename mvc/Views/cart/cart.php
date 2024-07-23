<!-- Start Hero Section -->
<div class="hero">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-5">
        <div class="intro-excerpt">
          <h1>Cart</h1>
        </div>
      </div>
      <div class="col-lg-7">

      </div>
    </div>
  </div>
</div>
<!-- End Hero Section -->

<!-- <?php print_r($data['products']); ?> -->

<div class="untree_co-section before-footer-section">
  <div class="container">
    <div class="row mb-5">
      <form class="col-md-12" method="post">
        <div class="site-blocks-table">
          <table class="table">
            <thead>
              <tr>
                <th class="product-thumbnail">Image</th>
                <th class="product-name">Product</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-total">Total</th>
                <th class="product-remove">Remove</th>
              </tr>
            </thead>

            <?php foreach ($data['products'] as $product) :  ?>
              <tr>
                <td class="product-thumbnail">
                  <img src="<?= WEB_ROOT ?>/public/css2/images/<?php echo $product['img_url'] ?>" alt="Image" class="img-fluid">
                  <!-- <img src="<?= WEB_ROOT ?>/public/css2/images/$product['img_url'] ?>" alt="Image" class="img-fluid"> -->
                </td>
                <td class="product-name">
                  <h2 class="h5 text-black"><?= $product['product_name'] ?></h2>
                </td>
                <td>$<?= $product['price'] ?></td>
                <td>
                  <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                    <div class="input-group-prepend">
                      <a href="<?= WEB_ROOT ?>/cart/decreasequantity/<?= $product['idcart'] ?>" class="btn btn-outline-black decrease" type="button">&minus;</a>
                    </div>
                    <input type="text" class="form-control text-center quantity-amount" value="<?= $product['quantity'] ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly>
                    <div class="input-group-append">
                      <a href="<?= WEB_ROOT ?>/cart/increasequantity/<?= $product['idcart'] ?>" class="btn btn-outline-black increase" type="button">&plus;</a>
                    </div>
                  </div>
                </td>
                <td>$<?= $product['total'] ?></td>
                <td><a href="<?= WEB_ROOT ?>/cart/delcart/<?= $product['idcart'] ?>" class="btn btn-black btn-sm">X</a></td>

              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </form>
    </div>
    
    <!-- <?php foreach ($data['products'] as $product) {
      $subtotal += $product['total'];
    }
    
    ?> -->


    <div class="row">
      <div class="col-md-6">
        <div class="row mb-5">
          <div class="col-md-6 mb-3 mb-md-0">
            <a href="<?= WEB_ROOT ?>/cart/oder"><button class="btn btn-black btn-sm btn-block">Order Cart</button></a>
            
          </div>
          <div class="col-md-6">
            <button class="btn btn-outline-black btn-sm btn-block">Continue Shopping</button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label class="text-black h4" for="coupon">Coupon</label>
            <p>Enter your coupon code if you have one.</p>
          </div>
          <div class="col-md-8 mb-3 mb-md-0">
            <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
          </div>
          <div class="col-md-4">
            <button class="btn btn-black">Apply Coupon</button>
          </div>
        </div>
      </div>
      <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-12 text-right border-bottom mb-5">
                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <span class="text-black">Subtotal</span>
              </div>
              <div class="col-md-6 text-right">
              <?php if (isset($subtotal)) : ?>
                  <strong class="text-black">$<?= $subtotal ?></strong>
                <?php else : ?>
                  <strong class="text-black">$0.00</strong>
                <?php endif; ?>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-6">
                <span class="text-black">Total</span>
              </div>
              <div class="col-md-6 text-right">
              <?php if (isset($subtotal)) : ?>
                  <strong class="text-black">$<?= $subtotal ?></strong>
                <?php else : ?>
                  <strong class="text-black">$0.00</strong>
                <?php endif; ?>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='<?= WEB_ROOT ?>/cart/checkout'">Proceed To Checkout</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>