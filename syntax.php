<?php
/**
 * Plugin dokuwiki_sitemap: Include the Dokuwiki Sitemap in the current page.
 * 
 *  Copyright 2022 6227020800@runbox.com
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 *  
 * @author     6227020800 <6227020800@runbox.com>
 *
 */
 
// must be run within DokuWiki
if(!defined('DOKU_INC')) die();
 
/**
 * All DokuWiki plugins to extend the parser/rendering mechanism
 * need to inherit from this class
 */
class syntax_plugin_dokuwiki_sitemap extends DokuWiki_Syntax_Plugin {
 
    public function getType() { return 'substition'; }
    public function getSort() { return 32; }
 
    public function connectTo($mode) {
        $this->Lexer->addSpecialPattern('<sitemap>',$mode,'plugin_test');
    }
 
    public function handle($match, $state, $pos, Doku_Handler $handler) {
        return array($match, $state, $pos);
    }
 
    public function render($mode, Doku_Renderer $renderer, $data) {
    // $data is what the function handle return'ed.
        $i = new dokuwiki\Ui\Index();
        if($mode == 'xhtml'){
            /** @var Doku_Renderer_xhtml $renderer */
            $renderer->doc .= $i->sitemap();
            return true;
        }
        return false;
    }
}


