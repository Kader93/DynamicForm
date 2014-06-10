<?php

namespace DynamicForm\Model\FormConfigManager;

interface FormConfigInterface {
    public function getContents();
    public function getArrayConfig($strContentsFile);
}