<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value,'-');
    }
    public function getUrlAttribute(){
        return route('questions.show',$this->slug);
    }
    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }
    public function getStatusAttribute(){
        if($this->answers > 0){
            if ($this->best_answer_id){
                return "answer-accepted";
            }
            return "answer";
        }
        return "unanswered";
    }
    public function getBodyHtmlAttribute(){
        return Str::markdown($this->body);
    }
}
