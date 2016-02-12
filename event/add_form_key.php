<?php
/**
 *
 * @package mchat
 * @copyright (c) 2016 TheH
 * @license http://www.gnu.org/licenses/agpl-3.0.html GNU Affero General Public License v3
 *
 */
namespace dmzx\mchat\event;
/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
/**
 * Event listener
 */
class add_form_key implements EventSubscriberInterface
{
    static public function getSubscribedEvents()
    {
        return array(
            'core.add_form_key' => 'add_form_key',
        );
    }
    /** @var \phpbb\template\template */
    protected $template;
    /**
     * Constructor
     */
    public function __construct(\phpbb\template\template $template)
    {
        $this->template = $template;
    }
    /**
    * Add additional template variable in case of form key for survey
    *
    * @param object $event The event object
    * @return null
    * @access public
    */
    public function add_form_key($event)
    {
        if ($event['form_name'] == 'mchat')
        {
            $this->template->assign_var('S_MCHAT_FORM_TOKEN', $event['s_fields']);
        }
    }
}
