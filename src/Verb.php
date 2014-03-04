<?php
/*
    Copyright 2014 Rustici Software

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
*/

namespace TinCan;

class Verb implements VersionableInterface {
    use ArraySetterTrait, FromJSONTrait, AsVersionTrait;

    protected $id;
    protected $display;

    static private $directProps = array(
        'id',
    );
    static private $versionedProps = array(
        'display',
    );

    public function __construct() {
        if (func_num_args() == 1) {
            $arg = func_get_arg(0);

            $this->_fromArray($arg);
        }

        if (! isset($this->display)) {
            $this->setDisplay(array());
        }
    }

    // FEATURE: check IRI?
    public function setId($value) { $this->id = $value; return $this; }
    public function getId() { return $this->id; }

    public function setDisplay($value) {
        if (! $value instanceof LanguageMap) {
            $value = new LanguageMap($value);
        }

        $this->display = $value;

        return $this;
    }
    public function getDisplay() { return $this->display; }
}
