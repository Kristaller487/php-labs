<?php

namespace App\Http\Controllers;


use Illuminate\View\View;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(): View
    {
        return view('hello', [
            "header1" => "Stable Diffusion",
            "header2" => "DALLE-2",
            "header3" => "Imagen",
            "header4" => "Midjourney",
            "text1" => "Stable Diffusion is a deep learning, text-to-image model released in 2022. It is primarily used to generate detailed images conditioned on text descriptions, though it can also be applied to other tasks such as inpainting, outpainting, and generating image-to-image translations guided by a text prompt",
            "text2" => 'DALL-E 2 are machine learning models developed by OpenAI to generate digital images from natural language descriptions, called "prompts". DALL-E was revealed by OpenAI in a blog post in January 2021, and uses a version of GPT-3[1] modified to generate images. In April 2022, OpenAI announced DALL-E 2, a successor designed to generate more realistic images at higher resolutions that "can combine concepts, attributes, and styles',
            "text3" => "Imagen, a text-to-image diffusion model with an unprecedented degree of photorealism and a deep level of language understanding. Imagen builds on the power of large transformer language models in understanding text and hinges on the strength of diffusion models in high-fidelity image generation",
            "text4" => "Midjourney is an independent research lab that produces a proprietary artificial intelligence program that creates images from textual descriptions, similar to OpenAI's DALL-E and the open-source Stable Diffusion.[1][2] The tool is currently in open beta, which it entered on July 12, 2022.",
            
        ]);
    }
}
