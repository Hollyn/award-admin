<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\CandidateRepository;
use App\Repositories\CandidateCategory;
use App\Repositories\CandidateCategoryRepository;
use App\Common\Utils;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    private $categoryRepository;
    private $candidateRepository;
    private $candidateCategoryRepository;
    private $utils;
    public function __construct(
        CategoryRepository $categoryRepository,
        CandidateRepository $candidateRepository,
        CandidateCategoryRepository $candidateCategoryRepository,
        Utils $utils
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->candidateRepository = $candidateRepository;
        $this->candidateCategoryRepository = $candidateCategoryRepository;
        $this->utils = $utils;
    }
    // Dashboard
    /**
     * this is where we are going to display the winners 
     * of each category
     */
    public function index()
    {
        $candidateCategoryNames = $this->candidateCategoryRepository->getAllCandidateCategoriesName();

        if ($candidateCategoryNames != null and count($candidateCategoryNames)) {
            $candidateCategoryNames = $this->utils->formatCandidateCategorNames($candidateCategoryNames);
        }

        return view('pages.index')->with('candidateCategoryNames', $candidateCategoryNames);
    }

    // category
    /**
     * this is where we are going to save each category
     */
    public function category(Request $request)
    {
        $categories = $this->categoryRepository->getAllCategories();
        if ($request->isMethod('post')) {
            $name = $request->input('name');
            $this->categoryRepository->saveCategory($name);
            return redirect('category');
        }

        return view('pages.category')->with('categories', $categories);
    }


    // candidate
    /**
     * this is where we are going to save every candidate
     */
    public function candidate(Request $request)
    {
        $categories = $this->categoryRepository->getAllCategories();
        $candidateCategories = $this->candidateCategoryRepository->getAllCandidateCategories();

        if ($request->isMethod('post')) {
            $categoryId = $request->input('category');
            if ($categoryId == 0) {
                return redirect('candidate')->withErrors([
                    'category' => 'Choose a category'
                ]);
            }
            $name = $request->input('name');
            $newCandidate = $this->candidateRepository->saveCandidate($name);
            if ($newCandidate != null) {
                // save the relation candidate - category
                if ($this->candidateCategoryRepository->saveCandidateCategory($newCandidate->id, $categoryId) != null) {
                    return redirect('candidate');
                } else {
                    $newCandidate->delete();
                    return redirect('candidate')->withErrors([
                        'all' => 'cannot save'
                    ]);
                }
            } else dd("Cannot save this candidate");
        }
        return view('pages.candidate')->with([
            'categories' => $categories,
            'candidateCategories' => $candidateCategories
        ]);
    }
}
