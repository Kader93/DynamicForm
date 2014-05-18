<?php

namespace DynamicForm\Model;

abstract class AbstractFormConfigManager {
    public abstract function getArrayConfig($strContentsFile);
    public abstract function isValidElement($element);
}