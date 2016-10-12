<div id="contentWrapLeft">



<?php
                            include_once('database.php');
                            $db=new Database();
                            $db->connect();
                           $query="select * from package";
                            $res=mysql_query($query);
                            $count = 0;
                                      while($data=mysql_fetch_array($res))
                                     { $count++;
                                     //echo "<option value='$res[0]'>$res[1]</option>";
                                      ?>
                                                  <div class="productWrap">
                                                      <div class="productImageWrap" id="productImageWrapID_<?php echo $count;?>">
                                                          <img src="<?php echo $data[5];?>" width="100px" height="100px" alt="Product<?php echo $count;?>">
                                                      </div>
                                                      <div class="productNameWrap">
                                                          Krups Coffee Maker
                                                      </div>
                                                      <div class="productPriceWrap">
                                                          <div class="productPriceWrapLeft">
                                                              $95
                                                          </div>
                                                          <div class="productPriceWrapRight">
                                                              <a href="http://www.webresourcesdepot.com/wp-content/uploads/file/jbasket/fly-to-basket/inc/functions.php?action=addToBasket&amp;productID=<?php echo $count;?>" onclick="return false;">
                                                                  <img src="fly/add-to-basket2.gif" alt="Add To Basket" id="featuredProduct_<?php echo $count;?>" width="111" height="32">
                                                              </a>
                                                          </div>
                                                      </div>
                                                  </div>

                                          <?php
                                    }
                                  ?>
     </div>