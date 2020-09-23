
      <!-- Side navigation links -->
      <li>
        <ul class="collapsible collapsible-accordion">
          <?php if($_SESSION["user_type"]=="customer"){ ?>   
            <li><a href="account.php" class="collapsible-header waves-effect arrow-r "><i class="fas fa-chevron-right" ></i>My Details</a>
            </li>
            <li><a href="note.php" class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i>Notes</a>
            </li>

          <?php } ?>

          <?php if($_SESSION["user_type"]=="head"){ ?>   
            <li><a href="dashhead.php" class="collapsible-header waves-effect arrow-r "><i class="fas fa-chevron-right" ></i>Customers Details</a>
            </li>
            <li><a href="allnotes.php" class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i>All Notes</a>
            </li>

          <?php } ?>
        </ul>
      </li>
      <!--/. Side navigation links -->