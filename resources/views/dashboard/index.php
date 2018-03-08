<!--
 |
 | In $plugin you'll find an instance of Plugin class.
 | If you'd like can pass variable to this view, for example:
 |
 | return PluginClassName()->view( 'dashboard.index', [ 'var' => 'value' ] );
 |
-->

<div class="buster-wp wrap">
    <h1><?php echo $plugin->Name ?></h1>

    <?php if (isset($feedback)) : ?>
        <h4><?php echo $feedback ?></h4>
    <?php endif; ?>

    <p><a href="https://github.com/MelonSmasher/Buster-WP" target="_blank">Buster WP</a> sends purge requests to your <a
                href="https://github.com/MelonSmasher/Buster" target="_blank">Buster server</a> when
        pages in WordPress are updated.</p>
    <p>This helps strikes a balance between performance and updated content delivery.</p>

    <h3><?php echo $plugin->Name ?> Settings</h3>

    <form action="" method="post">

        <?php wp_nonce_field('Options'); ?>

        <label>Buster Host</label>
        <input type="text"
               placeholder="buster.example.com"
               name="Buster_Server/host"
               value="<?php echo $plugin->options->get('Buster_Server.host') ?>"/>

        <br/>
        <label>Buster Port</label>
        <input type="text"
               placeholder="e.g. 80 or 443"
               name="Buster_Server/port"
               value="<?php echo $plugin->options->get('Buster_Server.port') ?>"/>

        <br/>
        <label>Use HTTPS</label>
        <input type="hidden"
               name="Buster_Server/uses_https"
               value="false"/>
        <input type="checkbox"
               name="Buster_Server/uses_https"
            <?php checked('true', $plugin->options->get('Buster_Server.uses_https')) ?>
               value="true"/>
        <br/>
        <label>Buster API Key</label>
        <input type="password"
               placeholder="Your buster API key"
               name="Buster_Server/api_key"
               value="<?php echo $plugin->options->get('Buster_Server.api_key') ?>"/>

        <br/>
        <label>Buster Scheme ID</label>
        <input type="text"
               placeholder="Scheme ID related this server"
               name="Buster_Server/scheme_id"
               value="<?php echo $plugin->options->get('Buster_Server.scheme_id') ?>"/>

        <br/>
        <label>Enable Buster</label>
        <input type="hidden"
               name="Buster_Server/enabled"
               value="false"/>
        <input type="checkbox"
               name="Buster_Server/enabled"
            <?php checked('true', $plugin->options->get('Buster_Server.enabled')) ?>
               value="true"/>
        <br/>
        <button>Update</button>

    </form>

    <?php if (!empty($plugin->options->get('Buster_Server.enabled'))) : ?>
        <h2>Buster Manual Purge</h2>
        <p>You manually can purge a page from the cache for this site by filling out the form below.</p>
        <form action="<?php echo($plugin->getPageUrl('purge_page')) ?>" method="post">
            <label>Path to Bust</label>
            <input type="text"
                   placeholder="/about"
                   name="Buster_Client/bust/page"
                   value=""
            />
            <br/>
            <button>Purge Page</button>
            <br/>
        </form>
        <h5>Warning: purging the entire cache is usually not needed, and will slow down the entire site.</h5>
        <p>You can purge the entire cache for this site by <a href="<?php echo($plugin->getPageUrl('purge_all')) ?>">clicking
                here</a>.</p>
    <?php endif; ?>

    <h2>Buster Purge History</h2>

    <?php if (!empty($status)) : ?>
        <h4><?php echo $status ?></h4>
    <?php endif; ?>

    <?php if (!empty($history)) : ?>
        <table style="width:100%;">
            <tr>
                <th>IP Address</th>
                <th>URI</th>
                <th>Result</th>
                <th>Code</th>
                <th>Time & Date</th>
            </tr>
            <?php foreach ($history as $purge) : ?>
                <tr>
                    <td>
                        <?php echo explode(':', $purge->url)[2] ?>
                    </td>
                    <td>
                        <?php echo $purge->path ?>
                    </td>
                    <td>
                        <?php if ($purge->response_code === 200) : ?>
                            Purged
                        <?php elseif ($purge->response_code === 412) : ?>
                            Not Cached
                        <?php else : ?>
                            <?php echo $purge->reason ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php echo $purge->response_code ?>
                    </td>
                    <td>
                        <?php echo Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $purge->created_at)
                            ->setTimezone(get_option('timezone_string'))
                            ->format('g:i a n/j/y') ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</div>