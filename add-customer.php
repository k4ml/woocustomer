<div class="wrap">
    <h2>Add Customer</h2>
    <form action="" method="post" name="addcustomer" id="addcustomer" class="validate" novalidate="novalidate">
    <table class="form-table">
        <tr class="form-field form-required">
                <th scope="row"><label for="email"><?php _e('E-mail'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
                <td><input name="email" type="email" id="email" value="<?php echo esc_attr( $new_user_email ); ?>" /></td>
        </tr>
        <tr class="form-field">
                <th scope="row"><label for="first_name"><?php _e('First Name') ?> </label></th>
                <td><input name="first_name" type="text" id="first_name" value="<?php echo esc_attr($new_user_firstname); ?>" /></td>
        </tr>
    </table>
    <?php submit_button( __( 'Add Customer'), 'primary', 'addcustomer', true, array( 'id' => 'addcustomersub' ) ); ?>
    </form>
</div>
