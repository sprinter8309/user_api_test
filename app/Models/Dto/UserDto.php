<?php

namespace App\Models\Dto;

use App\Components\Dto\BaseDto;

class UserDto extends BaseDto
{
    public ?int $id;
    
    public ?string $email;
    
    public ?string $name;
    
    public ?int $age;
    
    public ?string $sex;
    
    public ?string $birthday;
    
    public ?string $phone;
}
