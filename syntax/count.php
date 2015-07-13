<?php
/**
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Andreas Gohr <andi@splitbrain.org>
 */
// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

/**
 * This inherits from the table syntax, because it's basically the
 * same, just different output
 */
class syntax_plugin_data_count extends syntax_plugin_data_table {

    function getPType() {
        return 'normal';
    }

    /**
     * Connect pattern to lexer
     */
    function connectTo($mode) {
        $this->Lexer->addSpecialPattern('----+ *datacount(?: [ a-zA-Z0-9_]*)?-+\n.*?\n----+', $mode, 'plugin_data_count');
    }

    function handle($match, $state, $pos, Doku_Handler $handler) {
        $this->countMode = true;
        return parent::handle($match, $state, $pos, $handler);
    }
}
