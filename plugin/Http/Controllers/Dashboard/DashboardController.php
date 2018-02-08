<?php

namespace BusterWP\Http\Controllers\Dashboard;

use BusterWP\Http\Controllers\Controller;
use Buster\Client;

class DashboardController extends Controller
{

    public function index()
    {
        if (BusterWP()->options->get('Buster_Server.enabled') === 'true') {
            $status = false;
            $apiKey = BusterWP()->options->get('Buster_Server.api_key');
            $apiHost = BusterWP()->options->get('Buster_Server.host');
            $apiPort = BusterWP()->options->get('Buster_Server.port');
            $useHttps = (BusterWP()->options->get('Buster_Server.uses_https') === 'true') ? true : false;
            $schemeId = BusterWP()->options->get('Buster_Server.scheme_id');

            $buster = new Client($apiKey, $apiHost, $apiPort, $useHttps);
            $response = $buster->history(intval($schemeId));
            $body = $response->getBody();
            $history = json_decode($body->getContents())->data;

            if (empty($history)) $status = 'No purge history found for this scheme.';

        } else {
            $history = false;
            $status = 'Buster is not enabled!';
        }

        return BusterWP()
            ->view('dashboard.index')->with('status', $status)->with('history', $history);
    }

    public function saveOptions()
    {
        if ($this->request->verifyNonce('Options')) {
            BusterWP()->options->set('Buster_Server.host', $this->request->get('Buster_Server.host'));
            BusterWP()->options->set('Buster_Server.port', $this->request->get('Buster_Server.port'));
            BusterWP()->options->set('Buster_Server.uses_https', $this->request->get('Buster_Server.uses_https'));
            BusterWP()->options->set('Buster_Server.api_key', $this->request->get('Buster_Server.api_key'));
            BusterWP()->options->set('Buster_Server.scheme_id', $this->request->get('Buster_Server.scheme_id'));
            BusterWP()->options->set('Buster_Server.enabled', $this->request->get('Buster_Server.enabled'));
        }

        return $this->redirect(BusterWP()->getPageUrl('buster_wp'));
    }
}